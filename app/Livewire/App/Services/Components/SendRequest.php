<?php

namespace App\Livewire\App\Services\Components;

use App\Models\Building;
use App\Models\City;
use App\Models\Elevator;
use App\Models\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
use Throwable;

#[Layout('components.layouts.app')]
class SendRequest extends Component
{
    use Toast;

    public $buildingId;
    public $elevatorId;

    public $city;
    public $description;
    public $city_id;
    public $province_id;

    public $sendRequestModal = false;


    public function send()
    {


        $limitKey = 'key-' . auth()->id() . '-' . $this->buildingId . '-' . $this->elevatorId;

        // Define max attempts and lock time (in seconds)
        $maxAttempts = 3;
        $decaySeconds = 180; // 2 minutes

        if (RateLimiter::tooManyAttempts($limitKey, $maxAttempts)) {
            $this->warning('تعداد درخواست بیش از حد', 'لطفا پس از 3 دقیقه مجدد تلاش کنید');
            return;
        }

        try {
            $building = Building::find($this->buildingId);

            $this->validate([
                'buildingId' => 'required|exists:buildings,id',
                'elevatorId' => 'required|exists:elevators,id',
                'city_id' => 'required|exists:cities,id',
                'province_id' => 'required|exists:provinces,id',
                'description' => 'nullable|string|min:5|max:225',
            ]);

            $request = new Request();
            $request->user_id = auth()->id();
            $request->city_id = $this->city_id;
            $request->building_id = $this->buildingId;
            $request->referral = $this->generateRefferal();
            $request->description = $this->description;
            $request->status = 'pending';
            $request->lat = $building->latitude;
            $request->lng = $building->longitude;

            $address = $building->address;
            $name = $building->builder_name;
            $identify = $building->identify;

            $elevator = Elevator::find($this->elevatorId);

            $request->details = $address . '  ساختمان  ' . $name . ' پلاک ' . $identify . ' | ' . ' آسانسور با شناسه ' . $elevator->national_code . ' و نوع  ' . $elevator->translateType($elevator->type);
            $request->save();


            RateLimiter::hit($limitKey, $decaySeconds);

            $message = 'درخواست شما برای تکنسین‌های شهر ' . $this->city . ' ارسال شد ';
            $this->success('ارسال درخواست', $message, position: "toast-middle toast-center");

            $this->reset(['description']);
            $this->sendRequestModal = false;


            $this->redirectRoute('service.building-management', ['building' => $request->building_id]);

        } catch (Throwable $e) {
            $this->error($e->getMessage());
            logger($e->getMessage());
        }


    }


    public function showRequestModal()
    {

        $this->sendRequestModal = true;

    }

    public function mount(Building $building, Elevator $elevator)
    {
        //$this->city_id = $building->city()->id;

        $this->elevatorId = $elevator->id;
        $this->buildingId = $building->id;
        $city = City::find($building->city_id);

        $this->city = $city?->name;
        $this->city_id = $city->id;
        $this->province_id = $city->province->id;

    }

    public function generateRefferal()
    {
        do {
            $code = random_int(100000, 999999);
        } while (DB::table('requests')->where('referral', $code)->exists());

        return $code;
    }

    public function render()
    {
        $building = Building::find($this->buildingId);
        $elevator = Elevator::find($this->elevatorId);

        return view('livewire.app.services.components.send-request', compact(['building', 'elevator']));

    }
}
