{{--        <script type="application/ld+json">--}}
{{--            {--}}
{{--                "@context": "https://schema.org",--}}
{{--                "@type": "BlogPosting",--}}
{{--                "mainEntityOfPage": {--}}
{{--                    "@type": "WebPage",--}}
{{--                    "@id": "{{ singleBlogUrl($blog->id,$blog->title) }}"--}}
{{--                },--}}
{{--                "headline": "{{ e($blog->title) }}",--}}
{{--                "description": "{{ e(\Illuminate\Support\Str::limit(strip_tags($blog->content), 150)) }}",--}}
{{--                "image": "{{ asset('storage/'.$blog->images->first()->file_path) }}",--}}
{{--                "author": {--}}
{{--                    "@type": "Person",--}}
{{--                    "name": "{{ $blog->user->first_name ?? 'Unknown Author'   }} {{  $blog->user->last_name ?? 'Unknown Author' }}"--}}
{{--                },--}}
{{--                "publisher": {--}}
{{--                    "@type": "Organization",--}}
{{--                    "name": "{{ getSetting('website_title') ?? 'دناپکس' }}",--}}
{{--                    "logo": {--}}
{{--                        "@type": "ImageObject",--}}
{{--                        "url": "https://www.yourwebsite.com/logo.png"--}}
{{--                    }--}}
{{--                },--}}
{{--                "datePublished": "{{ $blog->created_at->format('c') }}",--}}
{{--                "dateModified": "{{ $blog->updated_at->format('c') }}"--}}
{{--            }--}}
{{--        </script>--}}
{{--        <meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 160) }}">--}}
{{--        <link rel="canonical" href="{{ singleBlogUrl($blog->id, $blog->title) }}">--}}
{{--        <meta property="og:type" content="article">--}}
{{--        <meta property="og:title" content="{{ $blog->title }}">--}}
{{--        <meta property="og:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 160) }}">--}}
{{--        <meta property="og:url" content="{{ singleBlogUrl($blog->id, $blog->title) }}">--}}
{{--        <meta property="og:image" content="{{ $blog->images->first() ? asset('storage/'.$blog->images->first()->file_path) : asset('default-image.jpg') }}">--}}
{{--        <meta property="og:site_name" content="{{ getSetting('website_title') }}">--}}
{{--        <meta property="article:author" content="{{ $blog->user->first_name . ' ' . $blog->user->last_name }}">--}}
{{--        <meta property="article:published_time" content="{{ $blog->created_at->format('c') }}">--}}
{{--        <meta property="article:modified_time" content="{{ $blog->updated_at->format('c') }}">--}}
