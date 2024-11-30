<meta name="description" content=" خرید محصولات مرغوب و اصیل دنا تولید شده سی سخت | خرید آنلاین {{ $category->name }} ">
<meta name="keywords" content="{{ $category->name }},خرید دناپکس">
<link rel="canonical" href="{{singleCategoryUrl($category->id,$category->name)}}">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $category->name }} - DenaPax">
<meta property="og:description"
      content="مشاهده لیست محصولات دسته‌بندی شده در سایت DenaPax. انتخاب {{ $category->name }} با بهترین کیفیت.">
<meta property="og:url" content="{{singleCategoryUrl($category->id,$category->name)}}">
<meta property="og:site_name" content="{{ getSetting('website_title') }}">

<script type="application/ld+json">
    @php
        $itemList = [];
        foreach ($category->products as $index => $product) {
            $itemList[] = [
                "@type" => "ListItem",
                "position" => $index + 1,
                "url" => singleProductUrl($product->id, $product->name),
                "name" => $product->name,
                "image" => asset($product->images()->first()->file_path ?? ''),
                "price" => number_format($product->variants->min('price')),
                "priceCurrency" => "IRT"
            ];
        }
    @endphp
    {
      "@context": "https://schema.org",
      "@type": "ItemList",
      "name": "{{ $category->name }}",
      "url": "{{ singleCategoryUrl($category->id, $category->name) }}",
      "itemListElement": @json($itemList)
    }
</script>

