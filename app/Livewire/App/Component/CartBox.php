<?php

namespace App\Livewire\App\Component;
use App\Models\Cart;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class CartBox extends Component
{
    use Toast;

    public bool $cartBox  = false;
    public $products = [];
    public $variant;

    public Cart $cart;

    public $shippingCost = 0;
    public $totalCost;
    public $cartCost;

    //protected $listeners = ['openCartBox' => 'openCartBox'];

    #[On('openCartBox')]
    public function openCartBox()
    {
        $this->cartBox = true;
        $this->getTotalCost();

    }
    #[On('closeCartBox')]
    public function closeCartBox()
    {
        $this->cartBox = false;

    }

    public function increaseQty(Cart $cart)
    {
       Gate::authorize('access-cart', $cart);
        $cart->increment('quantity');
        $this->shippingCost =  $this->calcShippingCost();
        $this->getTotalCost();
    }

    public function decreaseQty(Cart $cart)
    {
        Gate::authorize('access-cart', $cart);

        if ($cart->quantity > 1)
        {
            $cart->decrement('quantity');
        }
        else
        {
            $cart->delete();
           // $this->cartBox = false;
        }

        $this->shippingCost =  $this->calcShippingCost();
        $this->getTotalCost();
    }


    private function calcWeightSum()
    {
        $cart = Auth::user()->carts->load('variant');
        return $cart->sum(function ($cartItem)
        {
          return   $cartItem->variant->weight * $cartItem->quantity;

        });
    }

    public function getTotalCost()
    {

       $this->cartCost = Auth::user()->carts->sum(fn($cart) => $cart->variant->price * $cart->quantity);
       $this->totalCost = $this->cartCost + $this->shippingCost;
       $this->shippingCost =  $this->calcShippingCost();
    }

    private function calcShippingCost()
    {
        if($this->calcWeightSum() <= 1000)
        {
            return 49000;
        }
        elseif($this->calcWeightSum() > 1000 && $this->calcWeightSum() <= 2000)

        {
            return $this->calcWeightSum() * 40;
        }
        else
        {
            return $this->calcWeightSum() * 25;
        }

       // return 0;
    }


    public function payment()
    {

      if (Auth::user()->carts->isEmpty())
      {
          return;
      }

        $this->getTotalCost();
        $this->startPayment();
    }


    private function startPayment()
    {
        try {

            $paymentPrice = $this->totalCost;
            $description = 'پرداخت سفارش دناپکس';
            $callBackUrl = route('master.shop.orders');
            $phone = auth()->user()->phone ?? '09999999999';
            $email = auth()->user()->email ?? 'info@test.com';
            session()->put('paymentPrice', $paymentPrice);

            $response = zarinpal()
                ->amount(1000) // مبلغ تراکنش$finalPrice
                ->request()
                ->description($description) // توضیحات تراکنش
                ->callbackUrl($callBackUrl)
                ->mobile($phone)
                ->email($email)
                ->send();
            if (!$response->success())
            {

                $errorMessage = $response->error()->message();
                $this->warning('خطا',$errorMessage);

                return;

            }

            $payment = Payment::create([
                'user_id' => Auth::id(),
                'order_id' => null,
                'amount' => $this->totalCost,
                'payment_method' => 'credit_card',
                'transaction_id' => $response->authority(),
                'status' => 'pending',
                'payment_date' => now()->format('Y-m-d H:i:s'),
                'notes' => 'pending payment',
            ]);




            $callbackToken = Str::random(8);
            session()->put('callbackToken',$callbackToken);

            $paymentUrl = 'https://www.zarinpal.com/pg/StartPay/'.$response->authority();

            $this->redirect($paymentUrl);


        }
        catch (\Throwable $exception)
        {
           dd($exception->getMessage());

        }

    }






    public function render()
    {
        return view('livewire.app.component.cart-box')
        ->title('');
    }
}
