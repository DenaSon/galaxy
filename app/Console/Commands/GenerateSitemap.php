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
        $sitemap->add(Url::create('store')->setPriority(9.0)->setChangeFrequency('daily'));
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
        $response = Http::get('https://liftpal.ir/blogpress/wp-json/wp/v2/posts');

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
                        ->setPriority(0.4)
                        ->setLastModificationDate($lastModifiedDate)
                        ->setChangeFrequency('weekly')
                );

            }
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

        $sitemap->add(Url::create('/page/1/قوانین-مقررات')->setPriority(0.7)->setChangeFrequency('monthly'));
        $sitemap->add(Url::create('contact-us')->setPriority(0.7)->setChangeFrequency('monthly'));

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
