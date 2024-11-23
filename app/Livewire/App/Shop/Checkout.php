<?php

namespace App\Livewire\App\Shop;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class Checkout extends Component
{
    use Toast;


    public $cartItems;
    public $cartTotalCost;
    public $total;
    public $totalItems;

    public $shippingCost;


    public function mount()
    {
        $authCart = Auth::user()->carts;

        $this->cartTotalCost = $authCart->sum(fn($cart) => $cart->variant->price * $cart->quantity);
        $this->totalItems = $authCart->sum('quantity');
        $this->shippingCost = session()->get('shippingCost', 0);

        $this->total = ($this->cartTotalCost + $this->shippingCost);
    }


    public function startPayment()
    {
        $this->setNewPayment();
    }

    private function setNewPayment()
    {
        $user = Auth::user();
        try {

            $paymentPrice = $this->total;
            $description = 'پرداخت سفارش دناپکس';
            $callBackUrl = route('panel.checkoutPayment');
            $phone = Auth::user()->phone ?? '09999999999';
            $email = Auth::user()->email ?? 'customer@denapax.com';

            $response = zarinpal()
                ->amount($paymentPrice)
                ->request()
                ->description($description) // توضیحات تراکنش
                ->callbackUrl($callBackUrl)
                ->mobile($phone)
                ->email($email)
                ->send();
            if (!$response->success()) {

                $errorMessage = $response->error()->message();
                $this->warning('خطا', $errorMessage);

                return;

            }




            $tax_rate = getSetting('tax');
            $orderData = [
                'user_id' => $user->id,
                'address_id' => $user->addresses()->first()->id,
                'status' => 'pending',
                'total_price' => $this->total,
                'payment_status' => 'pending',
                'payment_method' => 'credit_card',
                'shipping_address' => 'nullable|string',
                'shipping_tracking' => null,
                'shipping_method' => 'post',
                'shipping_cost' => $this->shippingCost,
                'tax' => $tax_rate,
                'discount_amount' => 0,
                'subtotal' => $this->cartTotalCost,
                'payment_transaction_id' => null,
                'grand_total' => $paymentPrice,
                'currency' => 'IRT',
                'payment_due_date' => Carbon::now()->format('Y-m-d'),
            ];
            $order = Order::create($orderData);


            //End Set Order -first order

            $payment = Payment::create([
                'user_id' => $user->id,
                'order_id' => $order->id,
                'amount' => $this->total,
                'payment_method' => 'credit_card',
                'transaction_id' => $response->authority(),
                'status' => 'pending',
                'payment_date' => now()->format('Y-m-d H:i:s'),
                'notes' => 'pending payment',
            ]);

            $order->payment_transaction_id = $payment->transaction_id;
            $order->save();


            $callbackToken = Str::random(8);
            session()->put('callbackToken', $callbackToken);


            $paymentUrl = 'https://www.zarinpal.com/pg/StartPay/' . $response->authority();

            $this->redirect($paymentUrl);


        } catch (\Throwable $exception) {
            // Log error and delete order/payment if they exist
            Log::error("Payment failed: " . $exception->getMessage());
            if (isset($order)) {
                $order->delete();
            }
            if (isset($payment)) {
                $payment->delete();
            }


        }

    }


    private function setNewOrder()
    {

    }

    private function uniqueOrderNumber()
    {
        do {

            $orderNumber =  Carbon::now()->format('Ym') .mt_rand(10000, 99999);
        } while (Order::where('order_number', $orderNumber)->exists());

        return $orderNumber;
    }


    public function render()
    {
        return view('livewire.app.shop.checkout')
            ->title('');
    }
}
