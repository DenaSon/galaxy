<?php

namespace App\Livewire\Admin\Component;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class UserList extends Component
{
use Toast;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.admin.component.user-list')
        ->title('');
    }
}
