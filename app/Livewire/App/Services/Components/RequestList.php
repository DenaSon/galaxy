<?php

namespace App\Livewire\App\Services\Components;

use App\Models\Building;
use App\Models\Request;
use Illuminate\Container\Attributes\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class RequestList extends Component
{
    use Toast, WithoutUrlPagination;

    public $building = 1;


    public function mount(Building $building)
    {
        $this->building = $building;


    }

    public function cancelRequest(Request $request)
    {
        $request->update(['status' => 'rejected']);
        $this->info('لغو درخواست', 'درخواست لغو شد', position: 'toast-middle toast-center');
        $this->redirectRoute('service.building-management', ['building' => $this->building->id]);
    }

    public function render()
    {
        if (\request()->routeIs('service.building-management') && $this->building) {
            $requests = $this->building->requests()->latest()->paginate(10);
        } else {
            $technicianCityId = auth()->user()?->addresses()?->first()?->city?->id;

            $requests = Request::where('city_id', $technicianCityId)->latest()->paginate(10);

        }
        return view('livewire.app.services.components.request-list', compact('requests'));

    }
}
