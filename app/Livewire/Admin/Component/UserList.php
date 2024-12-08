<?php

namespace App\Livewire\Admin\Component;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

use Livewire\WithPagination;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class UserList extends Component
{
    use Toast,WithPagination;

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
        $users = User::withCount(['orders' => function ($query) {
            $query->where('payment_status', 'paid');
        }])
            ->withMax(['orders' => function ($query) {
                $query->where('payment_status', 'paid');
            }], 'created_at')
            ->withSum(['orders' => function ($query) {
                $query->where('payment_status', 'paid');
            }], 'grand_total')
            ->with(['orders' => function ($query) {
                $query->where('payment_status', 'paid')
                ->withSum('orderItems', 'quantity');
            }])


            ->orderBy('orders_count', $this->sortBy)
            ->latest('created_at')
            ->paginate(20);



        return view('livewire.admin.component.user-list', compact('users'));

    }
}
