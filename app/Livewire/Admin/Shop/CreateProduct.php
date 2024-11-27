<?php

namespace App\Livewire\Admin\Shop;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Random\RandomException;
use Throwable;

#[Title('محصول')]
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
    public $categories_list_selected;
    public $productId;
    public $photo_list;
    #[Validate('required|string')]
    public $unit = "";
    public $discount = 0;


    public function uploadPhotos(Product $product)
    {
        if (!empty($this->photos)) {
            $product = Product::find($this->productId);
            foreach ($this->photos as $photo) {
                $path = $photo->store('product_images', 'public');
                $product->images()->firstorcreate(['file_path' =>$path]);
                $this->photo_list = $product->images;


            }
            $this->success('آپلود', 'تصاویر با موفقیت آپلود شدند');
            $this->reset('photos');
        } else {
            $this->warning('آپلود', 'تصویری انتخاب نشده است');
        }
    }

    public function removeImage(Image $image)
    {
        $product = Product::findOrFail($this->productId);

        $image = Image::find($image->id);
        if ($image->delete()) {
            $this->info('تصویر حذف شد');
            $this->photo_list = $product->images;
        }


    }

    public function updatedName($value)
    {
        $product = Product::find($this->productId);
        $product->name = $value;
        $product->save();
    }

    public function updatedContent($value)
    {
        $product = Product::find($this->productId);
        $product->details = $value;
        $product->save();
    }


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
            if (request()->has('edit')) {
                $product = Product::findOrFail(request()->query('edit'));
                $this->productId = $product->id;
                $this->attrs = Attribute::all();
                $this->variant_list = Variant::whereProductId($product->id)->get();
                $this->setEditValues($this->productId);
            } else {
                $product = new Product(['unit' => '', 'sku' => $this->sku(), 'name' => '', 'is_active' => 0]);
                $product->save();
                $this->productId = $product->id;
                $this->attrs = Attribute::all();
            }

        } else {
            Log::error('Failed to make SKU');
            $this->redirectRoute('master.shop.list');
        }


    }


    public function publish()
    {
        $this->validate([
            'unit' =>'required|string',
            'description' => 'required|string|max:220',
            'name' => 'required|string|max:255',
            'discount' => 'numeric|nullable|max:100|min:0',
            'selectedCategories' => 'required|array',

        ]);

        $product = Product::findOrFail($this->productId);
        $product->categories()->sync(array_merge($this->selectedCategories, $this->selectedSubCategories));
        $product->description = $this->description;
        $product->is_active = true;
        $product->stop_selling = null;

        $product->unit = $this->unit;
        $product->discount = $this->discount;

        if ($product->save()) {
            $this->success(
                'محصول ذخیره شد',
                'انتشار محصول با موفقیت انجام شد'
            );

            $this->redirectRoute('master.shop.list');
        }

    }


    private function setEditValues($productId)
    {
        $product = Product::find($productId);
        $this->name = $product->name;
        $this->content = $product->details;
        $this->draft = $product->is_active;
        $this->description = $product->description;
        $this->unit = $product->unit;
        $this->discount = $product->discount;

        $this->selectedCategories = $product->categories->where('parent_id', '=', null)->pluck('id')->toArray();
        $this->subCategories = Category::whereIn('parent_id', $this->selectedCategories)->get();
        $this->selectedSubCategories = Category::whereIn('parent_id', $this->selectedCategories)->get()->pluck('id')->toArray();

        $this->photo_list = $product->images;


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
            'variants.*.weight' => 'required|numeric|min:10',
        ]);
        $product = Product::findOrFail($this->productId);
        foreach ($this->variants as $variant) {
            $product->variants()->firstOrCreate([
                'type' => $variant['type'],
                'price' => $variant['price'],
                'weight' => $variant['weight'],
            ]);
        }
        $this->variants[] = ['type' => '', 'price' => '','weight' => ''];


        $this->variant_list = $product->variants()->get();

        $this->toast('success', 'نوع محصول با موفقیت ذخیره شد');

    }


    public function deleteVariant(Variant $variant)
    {

        $variant->delete();
        $this->info('نوع حذف شد');
        $this->variant_list = Variant::where('product_id', '=', $this->productId)->get();
    }


    public function removeVariant($index)
    {
        unset($this->variants[$index]);
        $this->variants = array_values($this->variants);
    }


    /**
     * @throws RandomException
     */
    private function sku()
    {
        try {
            do {
                $date = Carbon::now()->format('Ymv');
                $uniqueId = random_int(1, 999999);
                $sku = "{$date}{$uniqueId}";
            } while (\App\Models\Product::where('sku', $sku)->exists());

            return $sku;
        }
        catch (Throwable $e)
        {
            Log::error($e->getMessage());
        }
    }

    public function render()
    {
        $categories_list = Category::whereParentId(null)->where('type','=','product')->latest()->get();

        return view('livewire.admin.shop.create-product', compact('categories_list'));

    }

}
