<?php

namespace App\Livewire\App\Profile;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class ProfileAddress extends Component
{

    use Toast;

    public User $user;

    public $states;

    public function mount()
    {
        $this->user = auth()->user();

    }



    public function registerAddress()
    {
        $this->dispatch('openAddressModal');
    }

    public function render()
    {
        return view('livewire.app.profile.profile-address')
            ->title('آدرس ها');
    }
}
