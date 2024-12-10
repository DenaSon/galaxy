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
        // Add static pages
        $sitemap->add(Url::create('/')->setPriority(1.0)->setChangeFrequency('daily'));
        $sitemap->add(Url::create('/page/1/درباره-ما')->setPriority(0.8)->setChangeFrequency('monthly'));


        // Add dynamic pages (e.g., products)
        $products = \App\Models\Product::all();
        foreach ($products as $product) {
            $sitemap->add(
                Url::create('/store/product/' . $product->id.'/'.slugMaker($product->name))
                    ->setPriority(0.9)
                    ->setLastModificationDate($product->updated_at)
                    ->setChangeFrequency('weekly')
            );


        }

        // Add dynamic pages (e.g., products)
        // Add dynamic pages (e.g., blogs)
        $response = Http::get('https://denapax.com/blogpress/wp-json/wp/v2/posts');

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
                        ->setPriority(0.9)
                        ->setLastModificationDate($lastModifiedDate)
                        ->setChangeFrequency('weekly')
                );
            }
        } else {
            // Log an error or handle the failed API response
            \Log::error('Failed to fetch blogs from API', ['status' => $response->status()]);
        }


        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
