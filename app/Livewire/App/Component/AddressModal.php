<?php

namespace App\Livewire\App\Component;

use App\Models\Address;
use App\Models\City;
use App\Models\Province;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;
use Psy\Exception\ThrowUpException;
use Throwable;

#[Layout('components.layouts.app')]
class AddressModal extends Component
{
    use Toast;


    public User $user;

    public $currentRouteName;

    public $tipText;

    public $city_list = [];
    public $province_list = [];

    public $address_line;
    #[Validate('required|exists:cities,id')]
    public $city;
    #[Validate('required|exists:provinces,id')]
    public $province;

    public $postal_code;

    public $latitude;
    public $longitude;
    public $is_default = false;


    public $first_name;
    public $last_name;


    public $addressModal = false;

    #[On('openAddressModal')]
    public function openAddressModal(): void
    {
        $this->addressModal = true;
        $this->dispatch('closeCartBox');
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->province_list = Province::get(['id', 'name']);
        $this->user = \Auth::user();

        $this->currentRouteName = Route::currentRouteName();
    }

    public function updatedProvince($value)
    {
        $this->validate([
            'province' => 'numeric|exists:provinces,id',
        ]);
        $this->city_list = City::where('province_id', $value)->get();
    }

    public function updatedPostalCode($value)
    {
        $persianNumbers = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $englishNumbers = ['0','1','2','3','4','5','6','7','8','9'];

        $this->postal_code = str_replace($persianNumbers, $englishNumbers, $value);

    }

    public function save()
    {

        // Ensure postal_code is converted before validation
        $persianNumbers = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $englishNumbers = ['0','1','2','3','4','5','6','7','8','9'];
        $this->postal_code = str_replace($persianNumbers, $englishNumbers, $this->postal_code);

        $this->validate([
            'province' => 'required|numeric|exists:provinces,id',
            'city' => 'required|numeric|exists:cities,id',
            'address_line' => 'string|max:254|min:5',
            'first_name' => 'required|string|max:120|min:3',
            'last_name' => 'required|string|max:120|min:3',
        ]);

        try {


            $address = new Address();
            $address->user_id = $this->user->id;
            $address->province_id = $this->province;
            $address->city_id = $this->city;
            $address->address_line = $this->address_line;
            if ($this->postal_code != null)
            {
                $address->postal_code = $this->postal_code;
            }
            else
            {
                $address->postal_code = '0000000000';
            }


            $exists_address = $this->user->addresses()->where('is_default', '=',true)->exists();
            if (!$exists_address) {
                $address->is_default = true;
            }

            $address->save();
            $this->info('آدرس ثبت شد', css: 'text-white bg-blue-500');
            $this->addressModal = false;


            if ($this->currentRouteName != 'service.technician-area') {
                $this->redirectRoute('panel.checkout', [], true, true);
            }

        }

        catch (Throwable $e)
        {
            $this->warning('آدرس شما ذخیره نشد','لطفا مجدد تلاش کنید');
            logger($e->getMessage());
        }


    }


    public function updatedFirstName($value)
    {
        $this->validate(['first_name' => 'required|string|max:120']);

        $this->user->update(['first_name' => $this->first_name]);

    }

    public function updatedLastName($value)
    {
        $this->validate(['last_name' => 'required|string|max:120']);
        $this->user->update(['last_name' => $this->last_name]);
    }


    public function showTip()
    {
        $this->tipText = 'صفحه کلید خود را در حالت انگیسی قرار دهید';
    }

    public function render()
    {
        return view('livewire.app.component.address-modal');

    }
}
