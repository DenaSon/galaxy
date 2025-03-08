<?php

namespace App\Livewire\App\Services\Building;

use App\Models\Building;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
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

    public function render()
    {
        $elevators = $this->building->elevators;
        return view('livewire.app.services.building.building-management', compact('elevators'))
            ->title('مدیریت ساختمان ' . $this->building->builder_name);
    }
}
