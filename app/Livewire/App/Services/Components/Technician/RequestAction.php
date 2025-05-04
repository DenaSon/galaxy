<?php

namespace App\Livewire\App\Services\Components\Technician;

use App\Events\RequestAccepted;
use App\Models\Building;
use App\Models\Request;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
use Throwable;

#[Layout('components.layouts.app')]
class RequestAction extends Component
{
    use Toast;

    public $requestActionModal;
    public $request;
    public $building;


    public function mount(Building $building, Request $request)
    {
        $this->building = $building;
        $this->request = $request;
    }

    public function confirmRequest()
    {
        try {
            if ($this->request->status == 'pending') {

                $this->request->status = 'approved';
                $this->request->save();

                $this->requestActionModal = false;

                event(new RequestAccepted($this->request)); //  event task: Send SMS

                $this->success('تایید درخواست','درخواست پذیرفته شد و پیامک اطلاع رسانی برای مدیر ساختمان ارسال شد.');

                return $this->redirectRoute('service.technician-area', [], true, true);

            } else {
                $this->warning('Access denied', 'Request has been changed to other status : ' . $this->request->status);
            }
        } catch (Throwable $e) {
            logger($e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.app.services.components.technician.request-action');
    }
}
