<?php

namespace App\Livewire\Admin\Shop\Inc;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.admin')]
class Accounting extends Component
{
    use Toast;

    public $showAccounting = false;
    public $purchase_price;
    public $sale_price;
    public $inventory;
    public $location;
    public $productId;


    public function mount($pid)
    {

        $accounting = \App\Models\Accounting::where('product_id', $pid)->first();
        if ($accounting)
        {
            $this->purchase_price = $accounting->purchase_price;
            $this->sale_price = $accounting->sale_price;
            $this->inventory = $accounting->inventory;
            $this->location = $accounting->location;
            $this->productId = $pid;

        }

    }

    public function save()
    {

        if (!$this->productId) {
            $this->error('Product ID is required');
            return;
        }

            $this->validate([
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'inventory' => 'numeric|required',
            'location' => 'string|nullable|max:150',

        ]);

        $accounting = \App\Models\Accounting::where('product_id',$this->productId)->first();

        if ($accounting) {

            $accounting->update([
                'purchase_price' => $this->purchase_price,
                'sale_price' => $this->sale_price,
                'inventory' => $this->inventory,
                'location' => $this->location
            ]);
        }
        else
        {

            \App\Models\Accounting::create([
                'product_id' => $this->productId,
                'purchase_price' => $this->purchase_price,
                'sale_price' => $this->sale_price,
                'inventory' => $this->inventory,
                'location' => $this->location
            ]);
        }

        $this->info('اطلاعات حسابداری برای محصول ثبت شد');
    }



    public function render()
    {
        return view('livewire.admin.shop.inc.accounting');

    }
}
