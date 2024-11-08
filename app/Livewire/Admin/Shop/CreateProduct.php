<?php

namespace App\Livewire\Admin\Shop;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;


#[Layout('components.layouts.admin')]

class CreateProduct extends Component
{
    use Toast, WithFileUploads;

    public $name = '';
    public $content = '';
    public $description = '';
    public $draft = false;
    public $additionalInfo = '';
    public array $selectedCategories = [];
    public array $selectedSubCategories = [];
    public $subCategories;
    public array $photos = [];
    public array $attribute = [];
    public $productId;



    public function updatedSelectedCategories()
    {
        if (empty($this->selectedCategories))
        {
            $this->subCategories = null;
        }
        else
        {
            $this->subCategories = Category::whereIn('parent_id', $this->selectedCategories)->get();

        }
    }



    public function mount()
    {
        if (!Product::where('sku',$this->sku())->first())
        {
            $product = new Product(['unit'=>'','sku'=> $this->sku(),'name'=>'dena','is_active'=>0]);
            $product->save();
            $this->productId = $product->id;
        }
        else
        {
            \Illuminate\Log\log('Failed to Make SKU');
            $this->redirectRoute('master.shop.list');
        }
    }

    private function sku()
    {
        $date = Carbon::now()->format('Ymd');
        $uniqueId = rand(1000,9999);
        return "{$date}{$uniqueId}";

    }

    public function render()
    {
        $categories_list = Category::query()->onlyParent()->where('type','product')->latest()->get();
        return view('livewire.admin.shop.create-product',compact('categories_list'))
        ->title('');
    }

}
