<?php

namespace App\Livewire\App\Shop;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;
use Throwable;

#[Layout('components.layouts.app')]
class Checkout extends Component
{
    use Toast;


    public $cartItems;
    public $cartTotalCost;
    public $total;
    public $totalItems;
    public $totalWeight;

    public $shippingCost;
    public $orderId;
    public $totalCost;
    public $grand_total;

    public $order;
    public $emptyFlag = false;

    /**
     * @throws \Exception
     */
    public function mount()
    {

        if ($user = Auth::user()) {


            $cartItems = $user->carts;
            if ($cartItems->isNotEmpty()) {

                $this->addCartItems();
                $this->totalItems = $cartItems->sum('quantity');
                $this->calcCosts();
                $this->saveOrderItems($this->order->id);
               // $this->clearCart();

            } elseif ($user->orders->isEmpty()) {
                $this->emptyFlag = true;
                return;
            } else {
                $this->order = $user->orders()
                    ->whereStatus('pending')
                    ->latest()
                    ->firstorFail();

                $this->calcCosts();


            }


        }


    }

    private function addCartItems()
    {
        $user = Auth::user();


        $address = $user->addresses()->where('is_default', 1)->with(['city', 'province'])->first();
        if (!$address) {
            throw new \Exception('User does not have a registered address.');
        }


        $this->cartTotalCost = $user->carts()
            ->with('variant')
            ->get()
            ->sum(fn($cart) => $cart->variant->price * $cart->quantity);


        $this->shippingCost = $this->calcShippingCost();


        $this->grand_total = $this->cartTotalCost + $this->shippingCost;


        $taxRate = getSetting('tax') ?? 0;


        $fullAddress = getShippingAddress($address);


        $order = Order::create([
            'user_id' => $user->id,
            'address_id' => $address->id,
            'status' => 'pending',
            'total_price' => $this->cartTotalCost,
            'payment_status' => 'pending',
            'payment_method' => 'credit_card',
            'shipping_address' => $fullAddress,
            'shipping_tracking' => null,
            'shipping_method' => 'post',
            'shipping_cost' => $this->shippingCost,
            'tax' => $taxRate,
            'weight' => $this->calcWeightSum(),
            'discount_amount' => 0,
            'subtotal' => $this->cartTotalCost,
            'payment_transaction_id' => null,
            'grand_total' => $this->grand_total,
            'currency' => 'IRT',
            'payment_due_date' => now()->toDateString(),
        ]);


        // Update object properties
        $this->orderId = $order->id;
        $this->order = $order;
        $this->totalWeight = $order->weight;
        $this->totalItems = 0;//$order->orderItems->sum('quantity');

    }


    private function calcShippingCost()
    {
        if ($this->calcWeightSum() <= 1000) {
            return getSetting('shipping_cost') ?? 59000;
        } elseif ($this->calcWeightSum() > 1000 && $this->calcWeightSum() <= 2000) {
            return $this->calcWeightSum() * 50;
        } else {
            return $this->calcWeightSum() * 35;
        }


        // return 0;
    }


    private function calcWeightSum()
    {
        $cart = Auth::user()->carts->load('variant');
        return $cart->sum(function ($cartItem) {
            return $cartItem->variant->weight * $cartItem->quantity;

        });
    }


    public function calcCosts()
    {
        try {

            $order = $this->order;
            $this->cartTotalCost = $order->total_price ?? 0;

            $this->totalWeight = $order->weight ?? 0;
            $this->shippingCost = $order->shipping_cost ?? 0;

            if (Auth::user()->addresses()
                ->where('is_default', 1)
            ->where('city_id', '=',839)->exists())
            {
                $this->shippingCost = 0;
            }

            $this->total = $order->total_price + $order->shipping_cost; // Total cost = cart + shipping

            if (Auth::user()->carts?->isEmpty()) {
                $this->totalItems = $order?->orderItems?->sum('quantity') ?? 0;
            } else {
                $this->totalItems = Auth::user()->carts()->sum('quantity');
            }

        } catch (Throwable $e) {
            throw new \Exception($e->getMessage());
        }
    }


    public function startPayment()
    {

        $this->clearCart();
        $this->calcCosts();
        $this->setNewPayment();
    }

    private function setNewPayment()
    {
        $user = Auth::user();

        try {

            $paymentAmount = $this->total;
            $description = ' پرداخت سفارش توسط : '.$user->phone;
            $callbackUrl = route('panel.checkoutPayment');


            $phone = $user->phone ?? '09999999999';
            $email = $user->email ?? 'customer@denapax.com';


            $response = zarinpal()
                ->amount($paymentAmount)
                ->request()
                ->description($description)
                ->callbackUrl($callbackUrl)
                ->mobile($phone)
                ->email($email)
                ->send();

            if (!$response->success()) {
                $this->warning('خطا', $response->error()->message());
                return;
            }


            // Retrieve frequently used data once
            $address = $user->addresses()->where('is_default', '=', 1)->with(['city', 'province'])->first();

            if (!$address) {
                throw new \Exception('User does not have a registered address.');
            }


            DB::transaction(function () use ($user, $address, $paymentAmount, $response) {

                $order = Order::find($this->orderId);

                $payment = Payment::create([
                    'user_id' => $user->id,
                    'order_id' => $this->order->id,
                    'amount' => $paymentAmount,
                    'payment_method' => 'credit_card',
                    'transaction_id' => $response->authority(),
                    'status' => 'pending',
                    'payment_date' => now(),
                    'notes' => 'pending payment',
                ]);

            });

            // Generate callback token and redirect to payment
            session()->put('callbackToken', true);
            $paymentUrl = 'https://www.zarinpal.com/pg/StartPay/' . $response->authority();
            $this->redirect($paymentUrl);

        } catch (\Throwable $exception) {
            // Log and clean up any partial operations
            Log::error("Payment process failed: " . $exception->getMessage() . '' . $exception->getFile() . '' . $exception->getLine());
            $this->error('خطا', 'خطا در پرداخت');
        }
    }

    private function clearCart()
    {
        Auth::user()->carts()->delete();
    }


    private function saveOrderItems($orderId)
    {
        try {
            $cartItems = Cart::where('user_id', auth()->id())->get();


            foreach ($cartItems as $cartItem) {

                OrderItem::create([
                    'order_id' => $orderId,
                    'product_id' => $cartItem->product_id,
                    'variant_id' => $cartItem->variant_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->variant->price,
                    'discount' => $cartItem->product->discount,
                    'title' => $cartItem->product->name . ' | ' . $cartItem->variant->type ?? '',
                ]);


            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());
        }
    }







    public function render()
    {
        return view('livewire.app.shop.checkout')
            ->title('تسویه حساب | دناپکس');
    }
}
