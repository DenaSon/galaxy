@php
    $schemaData = [
        "@context" => "https://schema.org",
        "@type" => "Product",
        "name" => $product->name,
        "description" => $product->description,
        "image" => [
            asset($product->images->get(0)->file_path ?? ''),
            asset($product->images->get(1)->file_path ?? '')
        ],
        "sku" => $product->sku,
        "brand" => [
            "@type" => "Brand",
            "name" => $product->categories->first()->name ?? 'Generic',
        ],
        "offers" => [
            "@type" => "Offer",
            "url" => singleProductUrl($product->id, $product->name),
            "priceCurrency" => "IRR", // ISO 4217 currency code
            "price" => $product->variants->first()->price * 10 ?? '0', // Convert to Rials if stored in Tomans
            "itemCondition" => "https://schema.org/NewCondition",
            "availability" => "https://schema.org/InStock",
            "seller" => [
                "@type" => "Organization",
                "name" => getSetting('website_title') ?? 'دناپکس',
            ],
            "hasMerchantReturnPolicy" => [
                "@type" => "MerchantReturnPolicy",
                "url" => route('home.singlePage',['page'=>4,'slug' => 'return-policy']), // Link to your return policy page
                "returnPolicyCategory" => "https://schema.org/RefundPolicy", // Options: RefundPolicy, ExchangePolicy, StoreCreditPolicy
            ],
        ],
    ];

    if ($product->comments->count() > 0) {
        $schemaData["aggregateRating"] = [
            "@type" => "AggregateRating",
            "ratingValue" => "5",
            "reviewCount" => $product->comments->count(),
        ];

        $schemaData["review"] = [
            [
                "@type" => "Review",
                "author" => [
                    "@type" => "Person",
                    "name" => $product->comments->first()?->username ?? 'Anonymous',
                ],
                "datePublished" => $product->comments->first()?->created_at->toIso8601String() ?? '',
                "reviewBody" => $product->comments->first()?->text ?? '',
                "reviewRating" => [
                    "@type" => "Rating",
                    "ratingValue" => "5",
                    "bestRating" => "5",
                    "worstRating" => "1",
                ],
            ]
        ];
    }
@endphp

<script type="application/ld+json">
    {!! json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
