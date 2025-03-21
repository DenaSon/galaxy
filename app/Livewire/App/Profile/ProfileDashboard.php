<?php

namespace App\Livewire\App\Profile;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class ProfileDashboard extends Component
{
    use Toast;

    public $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.app.profile.profile-dashboard')
        ->title('خلاصه فعالیت ها');
    }
}
