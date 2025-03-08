<?php

namespace App\Livewire\App\Services\Components;

use App\Models\Building;
use App\Models\Elevator;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
use Throwable;

#[Layout('components.layouts.app')]
class AddElevator extends Component
{
    use Toast;

    public $addElevatorModal = false;

    public $type;
    public $national_code;
    public $capacity;

    public $status;

    public $building;

    public function mount(Building $building)
    {
        $this->building = $building;
    }

    public function save()
    {
        $elevator = $this->validate([

            'type' => 'required',
            'national_code' => 'required|numeric|digits:10|unique:elevators,national_code',
            'capacity' => 'required|numeric',
            'status' => 'required|in:active,inactive',

        ]);
        try {


            $elevator['user_id'] = auth()->user()->id;
            $elevator['building_id'] = $this->building->id;

            Elevator::create($elevator);

            $this->addElevatorModal = false;
            $this->success('ثبت آسانسور', 'اطلاعات آسانسور شما با موفقیت ثبت شد');
            $this->redirectRoute('service.building-management', $this->building->id, false, true);
        } catch (Throwable $e) {
            logger($e->getMessage());
        }

    }

    public function render()
    {
        return view('livewire.app.services.components.add-elevator')
            ->title('');
    }
}
