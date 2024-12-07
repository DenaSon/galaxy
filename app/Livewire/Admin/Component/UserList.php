<?php

namespace App\Livewire\Admin\Component;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class UserList extends Component
{
    use Toast,WithoutUrlPagination;

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
            $query->where('payment_status', 'paid'); // فقط سفارش‌های پرداخت‌شده
        }])
            ->withMax(['orders' => function ($query) {
                $query->where('payment_status', 'paid'); // آخرین تاریخ سفارش‌های پرداخت‌شده
            }], 'created_at')
            ->withSum(['orders' => function ($query) {
                $query->where('payment_status', 'paid'); // مجموع مبلغ سفارش‌های پرداخت‌شده
            }], 'grand_total')
            ->with(['orders' => function ($query) {
                $query->where('payment_status', 'paid') // فقط سفارش‌های پرداخت‌شده
                ->withSum('orderItems', 'quantity'); // مجموع تعداد آیتم‌های هر سفارش
            }])

            ->orderBy('orders_count', $this->sortBy)
            ->latest()
            ->paginate(20);



        return view('livewire.admin.component.user-list', compact('users'));

    }
}
