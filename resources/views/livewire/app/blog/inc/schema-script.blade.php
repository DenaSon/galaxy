<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ singleBlogUrl($article['id'], $article['title']['rendered']) }}"
    },
    "headline": "{{ e($article['title']['rendered']) }}",
    "description": "{{ $article['yoast_head_json']['description']  }}",
    "image": "{{ $featuredImageUrl ?? '' }}", {{-- Update with the actual featured image --}}
    "author": {
        "@type": "Person",
        "name": "دناپکس"
    },
    "publisher": {
        "@type": "Organization",
        "name": "{{ getSetting('website_title') ?? 'دناپکس' }}",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ getSetting('website_logo') ?? asset('static/denapax-image/nopicuser.png') }}"
        }
    },
    "datePublished": "{{ \Carbon\Carbon::parse($article['date'])->format('c') }}",
    "dateModified": "{{ \Carbon\Carbon::parse($article['modified'])->format('c') }}"
}
</script>

<meta name="description" content="{{ $article['yoast_head_json']['description'] ?? $article['excerpt']['rendered']   }}">
<link rel="canonical" href="{{ singleBlogUrl($article['id'], $article['title']['rendered']) }}">
<meta property="og:type" content="{{ $article['yoast_head_json']['og_type']  }}">
<meta property="og:title" content="{{ $article['title']['rendered'] }}">
<meta property="og:description" content="{{ $article['yoast_head_json']['description'] ?? $article['excerpt']['rendered']  }}">
<meta property="og:url" content="{{ singleBlogUrl($article['id'], $article['title']['rendered']) }}">
<meta property="og:image" content="{{ $article['yoast_head_json']['og_image'][0]['url']  }}">
<meta property="og:site_name" content="{{ getSetting('website_title') }}">
<meta property="article:author" content="DenaPax">
<meta property="article:published_time" content="{{ \Carbon\Carbon::parse($article['date'])->format('c') }}">
<meta property="article:modified_time" content="{{ \Carbon\Carbon::parse($article['modified'])->format('c') }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $article['title']['rendered'] }}">
<meta name="twitter:description" content="{{ $article['yoast_head_json']['description'] ?? $article['excerpt']['rendered']  }}">
<meta name="twitter:image" content="{{ $article['yoast_head_json']['og_image'][0]['url'] }}">
