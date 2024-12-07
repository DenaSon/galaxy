<?php

namespace App\Livewire\Admin\Component;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class UserList extends Component
{
    use Toast;

    public $sortBy;

    public function mount()
    {
        $this->sortBy = 'asc'; // Default sorting order

    }

    public function toggleSort()
    {
        $this->sortBy = $this->sortBy === 'asc' ? 'desc' : 'asc';
    }

    public function render()
    {
        $users = User::withCount('orders')
            ->withMax('orders', 'created_at')
            ->withSum('orders', 'grand_total')
            ->with(['orders' => function ($query) {
                $query->withSum('orderItems', 'quantity');

            }])

            ->orderBy('orders_count', $this->sortBy)
            ->latest()
            ->get();


        return view('livewire.admin.component.user-list', compact('users'));

    }
}
