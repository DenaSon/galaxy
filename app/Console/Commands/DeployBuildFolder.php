<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeployBuildFolder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:deploy-build-folder';

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
        // مسیرهای مبدأ و مقصد
        $sourcePath = public_path('build'); // denapax/public/build
        $destinationPath = base_path('../public_html/build'); // public_html/build

        $this->info('Starting deployment...');

        // بررسی وجود پوشه build در مسیر مبدأ
        if (!is_dir($sourcePath)) {
            $this->error("Source folder not found: $sourcePath");
            return 1; // کد خطا
        }


        // حذف پوشه build قبلی در مقصد (اختیاری)
        if (is_dir($destinationPath)) {
            $this->deleteDirectory($destinationPath);
            $this->info("Deleted existing build folder in public_html.");
        }

        // کپی پوشه build به مقصد
        if (!$this->copyDirectory($sourcePath, $destinationPath)) {
            $this->error("Failed to copy build folder to: $destinationPath");
            return 1; // کد خطا
        }

        $this->info("Build folder successfully deployed to: $destinationPath");
        return 0;
    }


    protected function copyDirectory($source, $destination)
    {
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        foreach (scandir($source) as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $srcFile = $source . DIRECTORY_SEPARATOR . $file;
            $destFile = $destination . DIRECTORY_SEPARATOR . $file;

            if (is_dir($srcFile)) {
                $this->copyDirectory($srcFile, $destFile);
            } else {
                copy($srcFile, $destFile);
            }
        }

        return true;
    }


    protected function deleteDirectory($directory)
    {
        foreach (scandir($directory) as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $filePath = $directory . DIRECTORY_SEPARATOR . $file;

            if (is_dir($filePath)) {
                $this->deleteDirectory($filePath);
            } else {
                unlink($filePath);
            }
        }

        rmdir($directory);
    }
}
