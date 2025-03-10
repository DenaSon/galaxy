<?php

namespace App\Livewire\App\Services\Building;

use App\Models\Building;
use App\Models\Elevator;
use App\Models\Member;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class BuildingManagement extends Component
{
    use Toast, AuthorizesRequests;

    public $building;


    public function mount(Building $building)
    {
        $this->authorize('view', $building);
        $this->building = $building;
    }

    public function deleteElevator(Elevator $elevator)
    {

        $this->authorize('delete', $elevator);
        $elevator->delete();
        $this->info('', 'آسانسور حذف شد');
    }

    public function deleteMember(Member $member)
    {
        if ($this->building->id !== $member->building_id) {
            return;
        } else {
            $member->delete();
            $this->info('', 'عضو ساختمان حذف شد');
        }

    }

    public function render()
    {
        $elevators = $this->building->elevators()->latest()->get();
        $members = $this->building->members()->latest()->get();
        return view('livewire.app.services.building.building-management', compact('elevators', 'members'))
            ->title('مدیریت ساختمان ' . $this->building->builder_name);
    }
}
