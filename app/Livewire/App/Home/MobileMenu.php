<?php

namespace App\Livewire\App\Home;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class MobileMenu extends Component
{
use Toast;

    public $title;
    public function mount()
    {
        $this->title = 'Mobile Menu';
    }


    public function toaster()
    {
       $this->toast('سبد خرید','هنوز محصولی به سبد خرید اضافه نکرده اید',css: 'bg-primary text-white');
    }

    public function render()
    {
        return view('livewire.app.home.mobile-menu')
        ->title('');
    }
}
