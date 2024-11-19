<?php

namespace App\Livewire\App\Component;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class CartBox extends Component
{
use Toast;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.app.component.cart-box')
        ->title('');
    }
}
