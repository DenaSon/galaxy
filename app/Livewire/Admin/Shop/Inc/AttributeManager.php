<?php

namespace App\Livewire\Admin\Shop\Inc;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.admin')]

class AttributeManager extends Component
{
use Toast;

    public $attribute = [];
    public $productId;


    public function mount($attribute,$productId)
    {
        $this->attribute = $attribute;
        $this->productId = $productId;
    }


    public function render()
    {
        return view('livewire.admin.shop.inc.attribute-manager');
    }
}
