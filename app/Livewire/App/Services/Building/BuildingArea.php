<?php

namespace App\Livewire\App\Services\Building;

use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
use Throwable;

#[Layout('components.layouts.app')]
class BuildingArea extends Component
{
    use Toast;


    public $first_name;
    public $last_name;

    public $builder_name;
    public $emergency_contact;
    public $identify;
    public $address;
    public $latitude;
    public $longitude;
    public $floor;


    public function mount()
    {
        $this->first_name = \Auth::user()->first_name;
        $this->last_name = \Auth::user()->last_name;

    }

    public function updatedFirstname($value)
    {
        $user = \Auth::user();
        $user->update(['first_name' => $value]);

    }

    public function updatedLatitude($value)
    {
        $this->showLocation();
    }

    public function showLocation()
    {
        try {


            $lat = $this->latitude;
            $lng = $this->longitude;

            $apiKey = config('neshan.Api-service_key');


            $response = Http::withHeaders([
                'Api-Key' => $apiKey,
            ])->get('https://api.neshan.org/v5/reverse', [
                'lat' => $lat,
                'lng' => $lng,
            ]);

            if ($response->successful()) {
                $result = $response->json();
                if (isset($result['formatted_address'])) {
                    $this->address = $result['formatted_address'];

                }
            } else {
                $this->warning('', $response->body());
            }
        } catch (Throwable $e) {
            $this->warning('error', $e->getMessage());
            setLog('Get-Address', $e->getMessage(), 'warning');
        }
    }

    public function updatedLastname($value)
    {
        $user = \Auth::user();
        $user->update(['last_name' => $value]);

    }

    public function render()
    {
        return view('livewire.app.services.building.building-area')
            ->title('');
    }
}
