<?php

namespace App\Livewire\App\Supplier\Local;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class LocalRegister extends Component
{
    use Toast;
    public int $step = 1;
    public $tags = [];
    public $name;
    public $lastName;


    public function mount()
    {
        if (\Auth::check())
        {
            $this->step = 2;
        }


    }


    public function next()
    {


        if ($this->step == 1)
        {
           $this->validate(['name' => 'required']);
            $this->step++;
        }
        else
        {
            $this->step++;
        }
    }

    public function prev()
    {
        $this->step--;
    }




    public function loginAction()
    {
        $this->dispatch('openLoginModal');
    }

    public function render()
    {
        return view('livewire.app.supplier.local.local-register')
            ->title('');
    }
}
