<?php

namespace App\Livewire\App\Component;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class UserOrderList extends Component
{
    use Toast,WithPagination;

    public $user;

    public function render()
    {

        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.app.component.user-order-list', compact('orders'));

    }
}
