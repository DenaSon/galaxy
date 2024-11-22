<?php

namespace App\Livewire\App\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class CityField extends Component
{
use Toast;
    public $cities = [];
    public $selectedState;
    public $selectedCity;
    protected $listeners = ['stateChanged'];

    public function stateChanged($data)
    {
        $this->selectedState = $data['stateId'];

        $this->getCities();
    }


    public function getCities()
    {
        if (!$this->selectedState) {
            $this->warning('استان انتخاب نشده است.');
            return;
        }

        try {

            $response = Http::withHeaders([
                'Token' => config('postex.postex_token'), // توکن از تنظیمات
            ])->get('https://postex.ir/api/town/getTownsByStateId',
                ['stateId' => $this->selectedState]);


            if ($response->successful()) {
                // ذخیره لیست شهرها
                $this->cities = collect($response->json())
                    ->map(function ($city) {
                        return [
                            'value' => $city['townId'], // استفاده از کلید مناسب
                            'label' => $city['townName'], // استفاده از کلید مناسب
                        ];
                    })->toArray();

            } else {
                // مدیریت خطای API
                $this->warning('خطا در دریافت اطلاعات از API.');
            }
        } catch (\Exception $e) {
            // مدیریت خطاهای ارتباطی
            \Log::error('Error fetching cities: ' . $e->getMessage()); // ثبت خطا در لاگ
            $this->warning('خطایی در ارتباط با سرور رخ داده است.');
        }
    }




    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.app.component.city-field')
        ->title('');
    }
}
