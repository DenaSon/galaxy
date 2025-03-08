<?php

namespace App\Livewire\App\Services\Building;

use App\Models\Building;
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
    public $floors;

    public $show = true;


    public function removeBuilding($id)
    {
        try {
            $building = Building::where('user_id', auth()->user()->id)->where('id', $id)->first();
            $building->delete();
            $this->info('ساختمان حذف شد', '');
        } catch (Throwable $e) {
            $this->warning('Failed to remove building', $e->getMessage());
        }
    }


    public function saveBuilding()
    {
        $this->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'builder_name' => 'required|string',
            'emergency_contact' => 'nullable|numeric',
            'identify' => 'required|numeric',
            'address' => 'required|min:8',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'floors' => 'required|numeric',
        ]);
        try {
            $building = Building::create([
                'user_id' => auth()->user()->id,
                'builder_name' => $this->builder_name,
                'emergency_contact' => $this->emergency_contact,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'floors' => $this->floors,
                'address' => $this->address,
                'identify' => $this->identify,

            ]);

            if ($building) {

                $this->success('ثبت ساختمان', 'ساختمان شما با موفقیت ثبت شد');
            }

        } catch (Throwable $e) {

            $this->error('', $e->getMessage());
            $this->error = $e->getMessage();

        }


    }

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
        $buildings = Building::where('user_id', auth()->user()->id)->get() ?? [];

        return view('livewire.app.services.building.building-area', compact('buildings'))->title('مدیریت ساختمان');


    }
}
