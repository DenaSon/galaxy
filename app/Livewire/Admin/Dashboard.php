<?php

namespace App\Livewire\Admin;

use http\Client\Curl\User;
use Livewire\Component;
use Mary\Traits\Toast;

class Dashboard extends Component
{
    use Toast;

    public bool $myModal1 = false;


    public function showMe()
    {
        $this->warning(
            'It is working with redirect',
            'You were redirected to another url ...',

        );
    }


    public function render()
    {
        \Auth::login(\App\Models\User::find(1));
        return view('livewire.admin.dashboard')->layout('components.layouts.admin');
    }
}
