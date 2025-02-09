<!-- Basic Meta Tags -->
<meta name="robots" content="index, follow" />
@if (Request::is('/'))
    <link rel="canonical" href="https://liftpal.com/" />

@endif
<!-- SEO Meta Tags -->
<meta name="description" content="{{ getSetting('meta_description') ?? 'Reputable store for elevator parts and equipment, specialized services for installation, repair, and maintenance.

' }}" />
<meta name="keywords" content="{{ getSetting('meta_keywords') ?? 'liftpal : Reputable store for elevator parts and equipment, specialized services for installation, repair, and maintenance.' }}" />
<meta name="author" content="liftpal" />

<!-- Open Graph Meta Tags (Facebook, LinkedIn) -->
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ getSetting('website_title') ?? 'liftpal - Local Souvenirs & Nuts' }}" />
<meta property="og:description" content="{{ getSetting('meta_description') ?? 'Reputable store for elevator parts and equipment, specialized services for installation, repair, and maintenance.

' }}" />
<meta property="og:image" content="{{ asset('images/home-og-image.jpg') ?: asset('images/default-og-image.jpg') }}" />
<meta property="og:url" content="{{ url('/') }}" />
<meta property="og:site_name" content="{{ getSetting('website_title') ?? 'liftpal' }}" />
<meta property="og:locale" content="fa_IR" />

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ getSetting('website_title') ?? 'liftpal - Local Souvenirs & Nuts' }}" />
<meta name="twitter:description" content="{{ getSetting('meta_description') ?? 'Reputable store for elevator parts and equipment, specialized services for installation, repair, and maintenance.' }}" />
<meta name="twitter:image" content="{{ asset('images/home-og-image.jpg') }}" />




<!-- Structured Data -->
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "{{ getSetting('website_title') ?? 'LiftPal Elevator' }}",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('static/denapax-image/nopicuser.png') }}",
  "contactPoint": [
    {
      "@type": "ContactPoint",
      "telephone": "{{ getSetting('support_phone') ?? '+98-9173434796' }}",
      "contactType": "Customer Support",
      "areaServed": "IR",
      "availableLanguage": ["fa"]
    }
  ],
  "sameAs": [
    "https://www.instagram.com/denapax/",
    "https://www.instagram.com/sisakhtziba"
  ]
}
</script>

