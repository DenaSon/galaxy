<?php

namespace App\Livewire\App\Services\Components;

use App\Models\Building;
use App\Models\Request;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class StaticMap extends Component
{
    use Toast;

    public $staticMap;
    public $building;

    public $request;
    public $lat;
    public $lng;

    public $apiKey;

    public function mount(Building $building, Request $request)
    {

        $this->building = $building;
        $this->request = $request;

        $this->apiKey = config('neshan.Api-static_web_key');
        $this->lat = $request->lat;
        $this->lng = $request->lng;
    }

    public function showMap()
    {
        $this->staticMap = true;
    }

    public function render()
    {
        return view('livewire.app.services.components.static-map')
            ->title('');
    }
}
