<?php

namespace App\Livewire\App\Profile;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class ProfileInformation extends Component
{
    use Toast;

    public User $user;
    public $first_name;
    public $last_name;

    public function mount()
    {

        $this->user = \Auth::user();
        $this->first_name = \Auth::user()->first_name;
        $this->last_name = \Auth::user()->last_name;
    }

    public function saveInformation()
    {
        $this->validate([
            'first_name' => 'required|string',
            'last_name' =>  'required|string'
        ]);
       \Auth::user()->update(['first_name' => $this->first_name, 'last_name' => $this->last_name]);
       $this->info('اطلاعات با موفقیت ثبت شد');
       return redirect()->route('home.index-home');
    }

    public function render()
    {
        return view('livewire.app.profile.profile-information')
            ->title('');
    }
}
