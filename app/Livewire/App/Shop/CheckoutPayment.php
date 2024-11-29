<?php

namespace App\Livewire\App\Shop;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;
use Morilog\Jalali\Jalalian;
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

        $payment->update(['status' => 'completed', 'notes' => 'Paid Payment','reference_id' => $response->referenceId()]);
        $payment->order->update([
            'status' => 'preparing',
            'payment_status' => 'paid',
            'payment_transaction_id' => $response->referenceId(),

        ]);

        $this->order = $payment->order;
        $this->paymentStatus = 'success';

        $this->sendSuccessOrderSms($this->order->id);
        $order = Order::find($this->order->id);

        $this->sendOrderSmsToMaster(number_format($order->grand_total),$order->id,$order->user?->first_name. ' '. $order->user?->last_name,$order->user->phone,jdate($order->created_at));

    }
    else
    {
        $this->paymentStatus = 'failed';
        $payment->update(['status' => 'pending', 'amount' => 0]);
    }

    session()->forget('callbackToken');
}
catch (Throwable $e) {
    \Log::error('Payment callback failed', ['error' => $e->getMessage() . $e->getTraceAsString()]);
    $this->warning('خطا', 'خطایی رخ داده است، لطفا با پشتیبان تماس بگیرید');

}
}







public function sendOrderSmsToMaster($price, $orderId, $username, $phone, $datetime)
{
try {
    $template_id = config('sms.master_notify_payment_sms');

    $params = [
        'price' => $price,
        'order' => $orderId,
        'username' => $username,
        'phone' => $phone,
        'datetime' => $datetime,

    ];
    $supportPhone  = getSetting('support_phone') ?? '09173434796';

    sendSms($params, $supportPhone, $template_id);
}
catch (Throwable $e) {
    Log::error('Payment callback sms failed', ['error' => $e->getMessage() . $e->getFile() . $e->getLine()]);
}
}




private function sendSuccessOrderSms($orderId)
{
try {
    $template_id = config('sms.success_order_sms_code');

    $params = [
        'order' => $orderId,

    ];

    sendSms($params, \Auth::user()->phone, $template_id);
}
catch (Throwable $e) {
    Log::error('Payment callback sms failed', ['error' => $e->getMessage() . $e->getFile() . $e->getLine()]);
}
}


public function render()
{
return view('livewire.app.shop.checkout-payment')
    ->title('وضعیت پرداخت');
}
}
