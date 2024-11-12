<?php

namespace App\Livewire\Admin\Shop\Orders;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.admin')]

class OrderOverview extends Component
{
use Toast;


    public function save()
    {

//               $this->validate([
//                       ''=>'',
//
//                   ]);






       $this->success(
               'انجام شد',
               'با موفقیت <strong>ذخیره شد </strong>',
               position: 'bottom-end',
               icon: 'o-check-badge',
               css: 'bg-pink-500 text-base-100'
           );


    }

    public function mount()
    {

    }


    public function render()
    {
        return view('livewire.admin.shop.orders.order-overview')
        ->title('');
    }
}
