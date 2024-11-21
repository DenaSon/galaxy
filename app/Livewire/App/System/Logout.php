<?php

namespace App\Livewire\App\System;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class Logout extends Component
{
use Toast;

    public function mount()
    {
        if (Auth::check()) {
            Auth::logout(); // Logout the user
        }

        // Invalidate the session and regenerate the CSRF token after logout
        session()->invalidate();
        session()->regenerateToken();

        // Redirect to the home page
        return redirect()->route('home.index-home');
    }


    public function render()
    {
        return view('livewire.app.system.logout')
        ->title('');
    }
}
