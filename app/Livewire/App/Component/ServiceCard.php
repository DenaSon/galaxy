<?php

namespace App\Livewire\App\Component;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
use function Laravel\Prompts\warning;

#[Layout('components.layouts.app')]
class ServiceCard extends Component
{
    use Toast;

    public $service_title;
    public $service_description;
    public $service_image;
    public $service_link;

    public $btn_text;

    public $action;


    public function handleRequest($action)
    {
        if (\Auth::check()) {

            switch ($action) {
                case 'technician':
                    $this->redirectRoute('service.technician-area', [], true, true);
                    break;
                case 'building':
                    $this->redirectRoute('service.building-area', [], true, true);
                    break;

            }
        }
        else
        {
            $this->warning('','وارد حساب کاربری خود شوید');
            $this->dispatch('openLoginModal');

        }
    }


    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.app.component.service-card')
            ->title('');
    }
}
