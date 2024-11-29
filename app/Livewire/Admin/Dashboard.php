<?php

namespace App\Livewire\Admin;


use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;use Livewire\Component;
use Mary\Traits\Toast;
#[Title('داشبورد')]
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

        return view('livewire.admin.dashboard')->layout('components.layouts.admin');
    }
}
