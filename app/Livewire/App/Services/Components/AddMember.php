<?php

namespace App\Livewire\App\Services\Components;

use App\Models\Building;
use App\Models\Member;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
use Throwable;

#[Layout('components.layouts.app')]
class AddMember extends Component
{
    use Toast;

    public $name;
    public $phone;
    public $floor;
    public $unit;
    public $building_id;
    public $addMemberModal = false;

    public function mount(Building $building)
    {
        $this->building_id = $building->id;

    }


    public function save()
    {

        try {
            $member = $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['nullable', 'string', 'regex:/^09[0-9]{9}$/', 'unique:members,phone'],
                'floor' => ['nullable', 'integer', 'min:0'],
                'unit' => ['nullable', 'integer', 'min:0'],
            ]);

            $member['building_id'] = $this->building_id;

            Member::create($member);

            $this->addMemberModal = false;
            $this->success('ثبت عضو', 'اطلاعات عضو ساختمان با موفقیت ثبت شد');
            $this->redirectRoute('service.building-management', $this->building_id, false, true);

        } catch (Throwable $e) {
            logger($e->getMessage());
            $this->warning('ثبت عضو', $e->getMessage());
        }

    }


    public function render()
    {


        return view('livewire.app.services.components.add-member')
            ->title('');
    }
}
