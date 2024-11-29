<link rel="canonical" href="{{  singleProductUrl($product->id, $product->name) }}" />
<meta name="description" content="{{ strip_tags($product->description) }}"/>
<meta name="robots" content="index, follow" />
<meta property="og:type" content="product" />
<meta property="og:title" content="{{ $product->name }}" />
<meta property="og:description" content="{{ Str::limit($product->description, 200) }}" />
<meta property="og:image" content="{{ asset($product->images->first()?->file_path ?? 'default-image.jpg') }}" />
<meta property="og:url" content="{{ singleProductUrl($product->id, $product->name) }}" />
<meta property="og:site_name" content="{{ getSetting('website_title') ?? 'DenaPax' }}" />
<meta property="og:locale" content="fa_IR" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $product->name }}" />
<meta name="twitter:description" content="{{ Str::limit($product->description, 160) }}" />
<meta name="twitter:image" content="{{ asset($product->images->first()?->file_path ?? 'default-image.jpg') }}" />


<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Product",
      "name": "{{ $product->name }}",
  "description": "{{ strip_tags($product->description) }}",
  "image": [
    "{{ asset($product->images->get(0)->file_path ?? '') }}",
    "{{ asset($product->images->get(1)->file_path ?? '') }}"
  ],
  "sku": "{{ $product->sku }}",
  "brand": {
    "@type": "Brand",
    "name": "{{ $product->categories->first()->name ?? 'Generic' }}"
  },
  "offers": {
    "@type": "Offer",
    "url": "{{ singleProductUrl($product->id, $product->name) }}",
    "priceCurrency": "IRT",
    "price": "{{ $product->variants->first()->price ?? '0' }}",
    "itemCondition": "https://schema.org/NewCondition",
    "availability": "https://schema.org/InStock",
    "seller": {
      "@type": "Organization",
      "name": "{{ getSetting('website_title') ?? 'دناپکس' }}"
    }
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5",
    "reviewCount": "{{ $product->comments->count() ?? 0 }}"
  },
  "review": [
    {
      "@type": "Review",
      "author": {
        "@type": "Person",
        "name": "{{ $product->comments->first()?->username ?? 'Anonymous' }}"
      },
      "datePublished": "{{ $product->comments->first()?->created_at->toIso8601String() ?? '' }}",
      "reviewBody": "{{ $product->comments->first()?->text ?? '' }}",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5",
        "bestRating": "5",
        "worstRating": "1"
      }
    }
  ]
}
</script>
