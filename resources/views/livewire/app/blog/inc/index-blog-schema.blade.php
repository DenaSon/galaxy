@if(request()->has('category'))
    <link rel="canonical" href="{{ route('home.blog.indexBlog') }}" />

@endif
<script type="application/ld+json">
    @php
        $blogList = [];
        foreach ($blogs as $index => $blog) {
            $imageUrl = isset($blog['featured_media']['source_url']) ? $blog['featured_media']['source_url'] : ''; // بررسی وجود تصویر
            $blogList[] = [
                "@type" => "ListItem",
                "position" => $index + 1,
                "url" => route('home.blog.singleBlog', ['blog' => $blog['id'], 'slug' => slugMaker($blog['title']['rendered'])]), // URL مستقیم
                "name" => $blog['title']['rendered'],
                "image" => $imageUrl,
                "description" => strip_tags(Str::limit($blog['excerpt']['rendered'], 160)), // محدود کردن توضیحات
                "datePublished" => \Carbon\Carbon::parse($blog['date'])->toDateString(),
                "dateModified" => \Carbon\Carbon::parse($blog['modified'])->toDateString()
            ];
        }
    @endphp
    {
      "@context": "https://schema.org",
      "@type": "ItemList",
      "name": "مقالات وبلاگ دناپکس",
      "itemListElement": {!! json_encode($blogList, JSON_UNESCAPED_SLASHES) !!}
    }
</script>
