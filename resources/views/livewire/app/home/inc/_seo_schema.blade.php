<!-- Basic Meta Tags -->
<meta name="robots" content="index, follow" />
<link rel="canonical" href="{{ url('/') }}" />

<!-- SEO Meta Tags -->
<meta name="description" content="{{ getSetting('meta_description') ?? 'DenaPax is your trusted source for high-quality local souvenirs, nuts, and dried fruits. Discover the perfect mix for your taste!' }}" />
<meta name="keywords" content="{{ getSetting('meta_keywords') ?? 'souvenirs, nuts, dried fruits, local products, DenaPax' }}" />
<meta name="author" content="DenaPax" />

<!-- Open Graph Meta Tags (Facebook, LinkedIn) -->
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ getSetting('website_title') ?? 'DenaPax - Local Souvenirs & Nuts' }}" />
<meta property="og:description" content="{{ getSetting('meta_description') ?? 'Discover premium-quality local souvenirs, nuts, and dried fruits from DenaPax.' }}" />
<meta property="og:image" content="{{ asset('images/home-og-image.jpg') ?: asset('images/default-og-image.jpg') }}" />
<meta property="og:url" content="{{ url('/') }}" />
<meta property="og:site_name" content="{{ getSetting('website_title') ?? 'DenaPax' }}" />
<meta property="og:locale" content="fa_IR" />

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ getSetting('website_title') ?? 'DenaPax - Local Souvenirs & Nuts' }}" />
<meta name="twitter:description" content="{{ getSetting('meta_description') ?? 'Discover premium-quality local souvenirs, nuts, and dried fruits from DenaPax.' }}" />
<meta name="twitter:image" content="{{ asset('images/home-og-image.jpg') }}" />

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}" />
<link rel="icon" type="image/png" sizes="64x64" href="{{ asset('favicon-64x64.png') }}" />

<!-- Structured Data -->
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "{{ getSetting('website_title') ?? 'DenaPax' }}",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('static/denapax-image/nopicuser.png') }}",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "{{ getSetting('support_phone') ?? '+98-9173434796' }}",
    "contactType": "Customer Support",
    "areaServed": "IR",
    "availableLanguage": ["en", "fa"]
  },
  "sameAs": [
    "{{ getSetting('facebook_url') ?? '' }}",
    "{{ getSetting('instagram_url') ?? '' }}",
    "{{ getSetting('linkedin_url') ?? '' }}"
  ],
  "potentialAction": {
    "@type": "SearchAction",
    "target": "{{ url('/search?q={search_term_string}') }}",
    "query-input": "required name=search_term_string"
  }
}
</script>