<?php

namespace Denason\IranLocation\Console\Commands;

use Illuminate\Console\Command;
use Denason\IranLocation\Database\Seeders\IranLocationSeeder;

class IranLocationSeedCommand extends Command
{
    protected $signature = 'iran-location:seed';

    protected $description = 'Seed provinces and cities of Iran into the database';

    public function handle()
    {
        $this->info('Seeding Iranian provinces and cities...');

        $this->call('db:seed', [
            '--class' => IranLocationSeeder::class,
        ]);

        $this->info('✅ Iran location data seeded successfully.');
    }
}
