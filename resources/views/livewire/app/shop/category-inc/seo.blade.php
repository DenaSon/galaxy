<meta name="description"
      content="{{ \Illuminate\Support\Str::limit($category->description,165,'...') ?? 'خرید محصولات برتر دسته‌بندی شده با بهترین قیمت از سایت DenaPax' }}">
<meta name="keywords"
      content="{{ $category->name }}, خرید {{ $category->name }}, فروشگاه دناپکس, سوغات محلی, محصولات ارگانیک">

<link rel="canonical" href="{{singleCategoryUrl($category->id,$category->name)}}">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $category->name }} - خرید">
<meta property="og:description"
      content="مشاهده لیست محصولات دسته‌بندی شده در سایت DenaPax. انتخاب {{ $category->name }} با بهترین کیفیت.">
<meta property="og:url" content="{{singleCategoryUrl($category->id,$category->name)}}">
<meta property="og:site_name" content="{{ getSetting('website_title') }}">


<script type="application/ld+json">
    @php
        $itemList = [];
        foreach ($category->products as $index => $product) {
            $productImage = $product->images()->first();
            $itemList[] = [
                "@type" => "ListItem",
                "position" => $index + 1,
                "url" => singleProductUrl($product->id, $product->name), // Direct URL output
                "name" => $product->name,
                "image" => $productImage ? asset($productImage->file_path) : '', // Ensure image exists
                "price" => number_format($product->variants->min('price')),
                "priceCurrency" => "IRT",
                 "brand" => $product->brand ?? "نامشخص",
                "availability" => "https://schema.org/InStock"
            ];
        }
    @endphp
    {
      "@context": "https://schema.org",
      "@type": "ItemList",
      "name": "{{ $category->name }}",
      "itemListElement": {!! json_encode($itemList, JSON_UNESCAPED_SLASHES) !!}
    }
</script>





