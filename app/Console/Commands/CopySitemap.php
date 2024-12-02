<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CopySitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:copy-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $source = base_path('public/sitemap.xml'); // denapax/public/sitemap.xml
        $destination = base_path('../public_html/sitemap.xml'); // public_html/sitemap.xml


        if (!file_exists($source)) {
            $this->error("The source file does not exist at: {$source}");
            return 1;
        }


        if (copy($source, $destination)) {
            $this->info("The sitemap.xml file has been successfully copied to: {$destination}");
            return 0;
        } else {
            $this->error("Failed to copy the sitemap.xml file.");
            return 1;
        }
    }

}
