<?php

namespace App\Listeners;

use App\Events\RequestAccepted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mary\Traits\Toast;

class SendSmsForAcceptedRequest
{

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }
    public function handle(RequestAccepted $event)
    {
        $request = $event->request;


        $phone = $request->user->phone ?? null;
        $code = $request->referral ?? null;


        if (!$phone) {
            \Log::warning('Phone number is missing for request ID: ' . $request->id);
            return;
        }

        $params = [
            'code' => $code,
        ];


        return sendSms($params, $phone, config('sms.manager_request_notify'));





    }
}
