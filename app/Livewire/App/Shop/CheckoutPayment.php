<?php

namespace App\Livewire\App\Shop;

use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
use Throwable;

#[Layout('components.layouts.app')]
class CheckoutPayment extends Component
{
    use Toast;

    public $paymentStatus;
    public $paymentErrorMessage = 'خطا در پرداخت توسط کاربر';
    protected $middleware = ['auth'];

    public $order;

    public function mount()
    {
        if (!auth()->check() || !session()->get('callbackToken')) {
            //$this->dispatch('openLoginModal');
            $this->paymentStatus = 'failed';
            $this->paymentErrorMessage = 'خطا در پرداخت';
        }

        try {
            $data = request()->validate([
                'Authority' => 'required|string',
                'Status' => 'required|string|in:OK,NOK',
            ]);


            $payment = Payment::where('transaction_id', $data['Authority'])->firstOrFail();

            $response = zarinpal()
                ->amount($payment->amount)
                ->verification()
                ->authority($data['Authority'])
                ->send();

            if ($response->success()) {

                $payment->update(['status' => 'completed', 'notes' => 'Paid Payment']);
                $payment->order->update([
                    'status' => 'preparing',
                    'payment_status' => 'paid',
                    'payment_transaction_id' => $response->referenceId(),
                ]);

                $this->order = $payment->order;

                $this->paymentStatus = 'success';

                $this->sendSuccessOrderSms($this->order->id);

            }
            else
            {
                $this->paymentStatus = 'failed';
                $payment->update(['status' => 'failed', 'amount' => 0]);
            }

            session()->forget('callbackToken');
        }
        catch (Throwable $e) {
            \Log::error('Payment callback failed', ['error' => $e->getMessage()]);
            $this->warning('خطا', 'خطایی رخ داده است، لطفا با پشتیبان تماس بگیرید');

        }
    }




    private function sendSuccessOrderSms($orderId)
    {
        $template_id = config('sms.success_order_sms_code');

        $params = [
            'order' => $orderId,

        ];

        sendSms($params, \Auth::user()->phone, $template_id);
    }


    public function render()
    {
        return view('livewire.app.shop.checkout-payment')
            ->title('وضعیت پرداخت');
    }
}
