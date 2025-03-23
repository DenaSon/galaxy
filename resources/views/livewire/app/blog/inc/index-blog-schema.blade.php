@php use Illuminate\Support\Carbon; @endphp
@if(request()->has('category'))
    <link rel="canonical" href="{{ route('home.blog.indexBlog',['category'=>request()->get('category')]) }}"/>
@else
    <link rel="canonical" href="{{ route('home.blog.indexBlog') }}"/>
@endif

<script type="application/ld+json">
    @php

        $blogList = [];

        foreach ($blogs as $index => $blog) {
            $imageUrl = $blog->thumbnail ? $blog->thumbnail : '';
            $blogList[] = [
                "@type" => "ListItem",
                "position" => $index + 1,
                "url" => route('home.blog.singleBlog', ['blog' => $blog->ID, 'slug' => slugMaker($blog->post_name)]),
                "name" => $blog->title,
                "image" => $imageUrl,
                "description" => strip_tags(Str::limit($blog->excerpt, 160)),
                "datePublished" => Carbon::parse($blog->post_date)->toDateString(),
                "dateModified" => Carbon::parse($blog->post_modified)->toDateString()
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
