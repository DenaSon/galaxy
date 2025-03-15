<?php

namespace App\Livewire\App\Services\Components\Technician;

use App\Models\City;
use App\Models\Request;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class ReportList extends Component
{
    use Toast;

    public function mount()
    {

    }

    public function render()
    {
        $user = auth()->user();
        $technicianCity = optional($user->addresses()->first())->city?->name;
        $technicianCityId = optional($user->addresses()->first())->city?->id;
        $requests = Request::query()?->where('requests.city_id', '=', $technicianCityId)?->paginate(10);

        return view('livewire.app.services.components.technician.report-list', compact('requests', 'technicianCity'));
    }
}
