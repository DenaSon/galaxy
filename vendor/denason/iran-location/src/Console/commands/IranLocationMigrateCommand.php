<?php

namespace Denason\IranLocation\Console\Commands;
use Illuminate\Console\Command;

class IranLocationMigrateCommand extends Command
{
    protected $signature = 'iran-location:migrate';
    protected $description = 'Publish and run migrations for IranLocation package.';

    public function handle(): int
    {

        $this->info("Running migrations for iran-location package...");

        $migrationPath = __DIR__ . '/../Database/Migrations';

        $this->call('migrate', [
            '--path' => str_replace(base_path(), '', realpath($migrationPath)),
            '--realpath' => true,
        ]);

        $this->info($migrationPath);

        $this->info('IranLocation migrations completed successfully.');
        return Command::SUCCESS;
    }
}
