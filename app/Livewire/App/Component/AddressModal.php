<?php

namespace App\Livewire\App\Component;

use App\Models\Address;
use App\Models\City;
use App\Models\Province;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class AddressModal extends Component
{
use Toast;





    public User $user;

    public $city_list =[];
    public $province_list =[];

    public $address_line;
    #[Validate('required|exists:cities,id')]
    public $city;
    #[Validate('required|exists:provinces,id')]
    public $province;

    public $postal_code;

    public $latitude;
    public $longitude;
    public $is_default = false;


    public $addressModal = false;

    #[On('openAddressModal')]
    public function openAddressModal(): void
    {
        $this->addressModal = true;
        $this->dispatch('closeCartBox');
    }

    public function mount()
    {
        $this->province_list = Province::get(['id', 'name']);
        $this->user  = \Auth::user();
    }

    public function updatedProvince($value)
    {
        $this->validate([
            'province' => 'numeric|exists:provinces,id',
        ]);
        $this->city_list = City::where('province_id', $value)->get();
    }

    public function save()
    {
        $this->validate([
            'province' => 'required|numeric|exists:provinces,id',
            'city' => 'required|numeric|exists:cities,id',
            'postal_code' => 'required|numeric|min_digits:9',
            'address_line' => 'string|max:254|min:5',
        ]);

        $address = new Address();
        $address->user_id = $this->user->id;
        $address->province_id  = $this->province;
        $address->city_id = $this->city;
        $address->address_line = $this->address_line;
        $address->postal_code = $this->postal_code;
        $address->save();
        $this->info('آدرس ثبت شد',css: 'text-white bg-blue-500');
        $this->addressModal = false;


    }





    public function render()
    {
        return view('livewire.app.component.address-modal');

    }
}
