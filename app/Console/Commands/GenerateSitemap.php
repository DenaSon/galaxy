<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        $sitemap->add(Url::create('/')->setPriority(1.0)->setChangeFrequency('daily'));
        $sitemap->add(Url::create('store')->setPriority(0.7)->setChangeFrequency('daily'));
        // Add dynamic pages (e.g., products)
        $products = \App\Models\Product::all();
        foreach ($products as $product) {
            $sitemap->add(
                Url::create('/store/product/' . $product->id . '/' . slugMaker($product->name))
                    ->setPriority(0.9)
                    ->setLastModificationDate($product->updated_at)
                    ->setChangeFrequency('weekly')
            );


        }

        // Add dynamic pages (e.g., products)
        // Add dynamic pages (e.g., blogs)
        $response = Http::get('https://denapax.ir/blogpress/wp-json/wp/v2/posts');

        if ($response->successful()) {
            $blogs = $response->json();

            foreach ($blogs as $blog) {
                // Extract data from the API response
                $blogId = $blog['id']; // Assuming 'id' is available in the API response
                $blogTitle = $blog['title']['rendered'] ?? ''; // Safely accessing nested data
                $blogSlug = slugMaker($blogTitle); // Use your slugMaker function
                $lastModified = $blog['modified'] ?? null; // Assuming 'modified' is available
                $lastModifiedDate = $lastModified ? \Carbon\Carbon::parse($lastModified) : now();

                $sitemap->add(
                    Url::create('/blog/' . $blogId . '/' . $blogSlug)
                        ->setPriority(0.8)
                        ->setLastModificationDate($lastModifiedDate)
                        ->setChangeFrequency('daily')
                );

            }
            $sitemap->add(Url::create('https://denapax.ir/blog/17/%D8%B3%DB%8C-%D8%B3%D8%AE%D8%AA-%D9%86%DA%AF%DB%8C%D9%86-%D8%AF%D8%B1%D8%AE%D8%B4%D8%A7%D9%86-%D8%AF%D8%A7%D9%85%D9%86%D9%87-%D9%87%D8%A7%DB%8C-%D8%AF%D9%86%D8%A7')->setPriority(0.4)->setChangeFrequency('weekly'));
        } else {
            // Log an error or handle the failed API response
            \Log::error('Failed to fetch blogs from API', ['status' => $response->status()]);
        }


        // Add dynamic pages (e.g., products)
        $categories = \App\Models\Category::where('type', '=', 'product')->get();
        foreach ($categories as $category) {
            $sitemap->add(
                Url::create('/store/category/' . $category->id . '/' . slugMaker($category->name))
                    ->setPriority(0.7)
                    ->setLastModificationDate($category->updated_at)
                    ->setChangeFrequency('weekly')
            );


        }
        // Add static pages

        $sitemap->add(Url::create('/page/1/درباره-ما')->setPriority(0.4)->setChangeFrequency('yearly'));
        $sitemap->add(Url::create('contact-us')->setPriority(0.1)->setChangeFrequency('yearly'));

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
