<?php

namespace App\Livewire\App\Services\Technician;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class TechnicianPanel extends Component
{
use Toast;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.app.services.technician.technician-panel')
        ->title('');
    }
}
