<link rel="canonical" href="{{ url()->current() }}" />

@php
    $schemaData = [
        "@context" => "https://schema.org",
        "@type" => "Product",
         "inLanguage" => "fa-IR",
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

            "@type" => "AggregateOffer",
            "url" => singleProductUrl($product->id, $product->name),
            "priceCurrency" => "IRR", // ISO 4217 currency code
            "lowPrice" => $product->variants->min('price') * 10 ?? 0,
            "highPrice" => $product->variants->max('price') * 10 ?? 0,
            "itemCondition" => "https://schema.org/NewCondition",
            "priceValidUntil" => now()->addMonths(6)->format('Y-m-d'), // معتبر تا 6 ماه از امروز
            "availability" => "https://schema.org/InStock",
            "seller" => [
                "@type" => "Organization",
                "name" => getSetting('website_title') ?? 'دناپکس',
            ],
            "hasMerchantReturnPolicy" => [
                "@type" => "MerchantReturnPolicy",
                "url" => "https://denapax.com/page/4/return-policy",
                "returnPolicyCategory" => "https://schema.org/RefundPolicy",
            ],
            "shippingDetails" => [
                "@type" => "OfferShippingDetails",
                "shippingRate" => [
                    [
                        "@type" => "MonetaryAmount",
                        "value" => 590000, // هزینه ارسال به ریال
                        "currency" => "IRR", // کد ارز
                    ],
                ],
                "deliveryTime" => [
                    "@type" => "ShippingDeliveryTime",
                    "handlingTime" => [
                        "@type" => "QuantitativeValue",
                        "minValue" => 1, // حداقل زمان آماده‌سازی
                        "maxValue" => 3, // حداکثر زمان آماده‌سازی
                        "unitText" => "Day", // واحد زمان
                    ],
                    "transitTime" => [
                        "@type" => "QuantitativeValue",
                        "minValue" => 3, // حداقل زمان ارسال
                        "maxValue" => 6, // حداکثر زمان ارسال
                        "unitText" => "Day", // واحد زمان
                    ],
                ],
                "shippingDestination" => [
                    "@type" => "DefinedRegion",
                    "addressCountry" => "IR", // کد کشور ایران
                ],
            ],
        ],




    ];

if ($product->comments->count() > 0) {
    $schemaData["aggregateRating"] = [
        "@type" => "AggregateRating",
        "ratingValue" => "5", // Example: Replace with actual average rating if available
        "reviewCount" => $product->comments->count(), // Total number of reviews
    ];

    $schemaData["review"] = $product->comments->map(function ($comment) {
        return [
            "@type" => "Review",
            "author" => [
                "@type" => "Person",
                "name" => $comment->username ?? 'Anonymous',
            ],
            "datePublished" => $comment->created_at->toIso8601String(),
            "reviewBody" => $comment->text ?? '',
            "reviewRating" => [
                "@type" => "Rating",
                "ratingValue" => $comment->rating ?? '5', // Individual review rating
                "bestRating" => "5",
                "worstRating" => "1",
            ],
        ];
    })->toArray();
} else {
    // Fallback for no reviews
    $schemaData["aggregateRating"] = [
        "@type" => "AggregateRating",
        "ratingValue" => "4", // Default to 1 when no reviews
        "reviewCount" =>1, // No reviews available
    ];

    $schemaData["review"] = [
        [
            "@type" => "Review",
            "author" => [
                "@type" => "Person",
                "name" => "Anonymous",
            ],
            "datePublished" => now()->toIso8601String(),
            "reviewBody" => "No reviews yet for this product.",
            "reviewRating" => [
                "@type" => "Rating",
                "ratingValue" => "1", // Default rating value
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
