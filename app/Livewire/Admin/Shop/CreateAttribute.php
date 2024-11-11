<?php

namespace App\Livewire\Admin\Shop;

use App\Models\Attribute;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.admin')]
class CreateAttribute extends Component
{
    use Toast;
    public $name;

    public function save()
    {
        $this->validate([
            'name' => 'required|string|unique:attributes,name',
        ]);

       Attribute::firstOrCreate(['name' => $this->name]);

         $this->success('ویژگی جدید ذخیره شد');
         $this->reset('name');


    }

    public function delete(Attribute $attribute)
    {
        $attribute->delete();

    }

    public function mount()
    {

    }


    public function render()
    {
        $attributes = Attribute::all();
        return view('livewire.admin.shop.create-attribute',compact('attributes'))
            ->title('افزودن ویژگی');
    }
}
