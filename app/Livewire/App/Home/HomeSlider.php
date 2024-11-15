<?php

namespace App\Livewire\App\Home;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class HomeSlider extends Component
{
use Toast;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.app.home.home-slider')
        ->title('');
    }
}
