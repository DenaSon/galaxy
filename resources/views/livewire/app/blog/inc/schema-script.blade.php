<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ singleBlogUrl($article['id'], $article['title']['rendered']) }}"
    },
    "headline": "{{ e($article['title']['rendered']) }}",
    "description": "{{ e(\Illuminate\Support\Str::limit(strip_tags($article['excerpt']['rendered']), 150)) }}",
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
            "url": "https://www.yourwebsite.com/logo.png"
        }
    },
    "datePublished": "{{ \Carbon\Carbon::parse($article['date'])->format('c') }}",
    "dateModified": "{{ \Carbon\Carbon::parse($article['modified'])->format('c') }}"
}
</script>

<meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($article['content']['rendered']), 160) }}">
<link rel="canonical" href="{{ singleBlogUrl($article['id'], $article['title']['rendered']) }}">
<meta property="og:type" content="article">
<meta property="og:title" content="{{ $article['title']['rendered'] }}">
<meta property="og:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($article['content']['rendered']), 160) }}">
<meta property="og:url" content="{{ singleBlogUrl($article['id'], $article['title']['rendered']) }}">
<meta property="og:image" content="{{ $featuredImageUrl ?? asset('default-image.jpg') }}"> {{-- Default image fallback --}}
<meta property="og:site_name" content="{{ getSetting('website_title') }}">
<meta property="article:author" content="DenaPax">
<meta property="article:published_time" content="{{ \Carbon\Carbon::parse($article['date'])->format('c') }}">
<meta property="article:modified_time" content="{{ \Carbon\Carbon::parse($article['modified'])->format('c') }}">
