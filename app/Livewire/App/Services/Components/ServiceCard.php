<?php

namespace App\Livewire\App\Services\Components;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
#[Lazy]
class ServiceCard extends Component
{
    use Toast;

    public $service_title;
    public $service_description;
    public $service_image;
    public $service_link;



    public function mount()
    {


    }

    public function render()
    {
        return view('livewire.app.services.components.service-card')
            ->title('');
    }
}
