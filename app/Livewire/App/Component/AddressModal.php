<?php

namespace App\Livewire\App\Component;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class AddressModal extends Component
{
use Toast;

    public User $user;

    public $state_list =[];

    public $address_line;
    public $city;
    public $state;
    public $postal_code;
    public $country;
    public $latitude;
    public $longitude;
    public $is_default = false;


    public $addressModal = false;

    public function mount()
    {
        $this->getStateList();
    }


    private function getStateList()
    {
        $this->state_list = [
            ['value' => '100', 'name' => 'آذربایجان شرقی'],
            ['value' => '101', 'name' => 'آذربایجان غربی'],
            ['value' => '102', 'name' => 'اردبیل'],
            ['value' => '103', 'name' => 'اصفهان'],
            ['value' => '104', 'name' => 'البرز'],
            ['value' => '105', 'name' => 'ایلام'],
            ['value' => '106', 'name' => 'بوشهر'],
            ['value' => '107', 'name' => 'تهران'],
            ['value' => '108', 'name' => 'چهارمحال و بختیاری'],
            ['value' => '109', 'name' => 'خراسان جنوبی'],
            ['value' => '110', 'name' => 'خراسان رضوی'],
            ['value' => '111', 'name' => 'خراسان شمالی'],
            ['value' => '112', 'name' => 'خوزستان'],
            ['value' => '113', 'name' => 'زنجان'],
            ['value' => '114', 'name' => 'سمنان'],
            ['value' => '115', 'name' => 'سیستان و بلوچستان'],
            ['value' => '116', 'name' => 'فارس'],
            ['value' => '117', 'name' => 'قزوین'],
            ['value' => '118', 'name' => 'قم'],
            ['value' => '119', 'name' => 'کردستان'],
            ['value' => '120', 'name' => 'کرمان'],
            ['value' => '121', 'name' => 'کرمانشاه'],
            ['value' => '122', 'name' => 'کهگیلویه و بویراحمد'],
            ['value' => '123', 'name' => 'گلستان'],
            ['value' => '124', 'name' => 'گیلان'],
            ['value' => '125', 'name' => 'لرستان'],
            ['value' => '126', 'name' => 'مازندران'],
            ['value' => '127', 'name' => 'مرکزی'],
            ['value' => '128', 'name' => 'هرمزگان'],
            ['value' => '129', 'name' => 'همدان'],
            ['value' => '130', 'name' => 'یزد']
        ];
    }


    public function render()
    {
        return view('livewire.app.component.address-modal');

    }
}
