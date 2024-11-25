<?php

namespace App\Livewire\App\System;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class LoginPage extends Component
{
    use Toast;


    public function login()
    {
        return redirect()->route('home.index-home');

    }

}
