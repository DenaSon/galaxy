<?php

namespace App\Livewire\Admin\Shop;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;


#[Layout('components.layouts.admin')]
class CreateProduct extends Component
{
    use Toast, WithFileUploads;

    public $showAttrs = false;
    public $showImages = false;
    public $showVariants = false;
    public $variants = [];
    public $name = '';
    public $content = '';
    public $description = '';
    public $draft = false;
    public $additionalInfo = '';
    public array $selectedCategories = [];
    public array $selectedSubCategories = [];
    public $subCategories;
    public array $photos = [];
    public $attrs;
    public $attributeValues = []; // Store attribute values here
    public $variant_list;

    public $productId;


    public function updatedSelectedCategories()
    {
        if (empty($this->selectedCategories)) {
            $this->subCategories = null;
        } else {
            $this->subCategories = Category::whereIn('parent_id', $this->selectedCategories)->get();

        }
    }

    public function mount()
    {

        $this->variants[] = ['type' => '', 'price' => ''];
        if (!Product::where('sku', $this->sku())->first()) {
            $product = new Product(['unit' => '', 'sku' => $this->sku(), 'name' => 'dena', 'is_active' => 0]);
            $product->save();
            $this->productId = $product->id;

            $this->attrs = Attribute::all();


        } else {
            \Illuminate\Log\log('Failed to Make SKU');
            $this->redirectRoute('master.shop.list');
        }
    }


    public function saveAttrs()
    {
        $product = Product::find($this->productId);

        foreach ($this->attributeValues as $attributeId => $value) {

            if (empty($value)) {
                continue;
            }


            if (!$product->attributes()->where('attribute_id', $attributeId)->exists()) {
                $product->attributes()->attach($attributeId, ['value' => $value]);
            } else {

                $product->attributes()->updateExistingPivot($attributeId, ['value' => $value]);
            }
        }

        $this->success('ویژگی ها برای محصول ثبت شدند');
    }

    public function saveVariants()
    {
        $product = Product::find($this->productId);

        $this->validate([
            'variants.*.type' => 'required|string',
            'variants.*.price' => 'required|numeric|min:0',
        ]);
        $product = Product::findOrFail($this->productId);
        foreach ($this->variants as $variant) {
            $product->variants()->firstOrCreate([
                'type' => $variant['type'],
                'price' => $variant['price'],
            ]);
        }
        $this->variants[] = ['type' => '', 'price' => ''];


        $this->variant_list = $product->variants()->get();

        $this->toast('success', 'نوع محصول با موفقیت ذخیره شد');

    }



    public function deleteVariant(Variant $variant)
    {

        $variant->delete();
        $this->info('نوع حذف شد');
        $this->variant_list = Variant::where('product_id','=',$this->productId)->get();
    }



    public function removeVariant($index)
    {
        unset($this->variants[$index]);
        $this->variants = array_values($this->variants);
    }


    private function sku()
    {
        $date = Carbon::now()->format('Ymd');
        $uniqueId = rand(1000, 9999);
        return "{$date}{$uniqueId}";

    }

    public function render()
    {
        $categories_list = Category::query()->onlyParent()->where('type', 'product')->latest()->get();
        return view('livewire.admin.shop.create-product', compact('categories_list'))
            ->title('');
    }

}
