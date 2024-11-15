<?php

namespace App\Livewire\App\System;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class Login extends Component
{
    use Toast;

    public $pin;

    public bool $loginModal = false;

    public bool $verifyModal = false;

    public $phoneNumber;

    public function sendVerifySms()
    {

        $this->loginModal = false;
        $this->verifyModal = true;

    }

    public function login()
    {
        $this->validate([
            'pin' => 'required|digits:4|numeric',
        ]);
        $this->warning($this->pin);
    }



    public function render()
    {

        return view('livewire.app.system.login');

    }
}
