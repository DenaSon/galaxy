<?php

namespace App\Livewire\App\Services\Technician;

use App\Models\Role;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class TechnicianArea extends Component
{
    use Toast;

    public $step = 1;

    public function register_address()
    {
        $this->dispatch('openAddressModal');
    }


    public function next()
    {
        $this->step++;


        if ($this->step > 3)
        {
            $this->step = 3;
        }
    }

    public function prev()
    {
        $this->step--;
        if ($this->step <= 1)
        {
            $this->step = 1;
        }
    }

    public function mount()
    {
        if (\Auth::check()) {
            $this->step = 2;
        }
        if (\Auth::check() && \Auth::user()->addresses()->count() > 0) {
            $this->step = 3;
        }



    }

    public function activeTechnician()
    {
        $user = \Auth::user();
        $role = Role::where('name', 'technician')->first();

        if (!$user->isTechnician()) {
            $user->roles()->attach($role->id);
            $this->success('فعالسازی حساب تکنسین','حساب کاربری شما بعنوان تکنسین فعال شد');
        }
        else
        {
            $this->info('دسترسی حساب شما : تکنسین می باشد');
        }

    }

    public function render()
    {
        return view('livewire.app.services.technician.technician-area')
            ->title('خدمات تکنسین لیفت‌پال');
    }
}
