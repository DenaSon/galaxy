<?php

namespace Denason\IranLocation\Console\Commands;

use Illuminate\Console\Command;

class IranLocationInstallCommand extends Command
{
    protected $signature = 'iran-location:install';
    protected $description = 'Install the IranLocation package (migrate, seed, publish, etc).';

    public function handle(): int
    {
        $this->warn('🔧 Installing DenaSon/Iran-Location package...');

        if (!$this->publishConfig()) return Command::FAILURE;
        if (!$this->runMigrations()) return Command::FAILURE;
        if (!$this->runSeeder()) return Command::FAILURE;

        $this->info('🎉 <fg=green>IranLocation package installed successfully!</>');
        return Command::SUCCESS;
    }

    protected function publishConfig(): bool
    {
        $this->line('📄 <fg=yellow>Publishing config file...</>');

        if ($this->callSilent('vendor:publish', [
                '--tag' => 'iran-location-config',
                '--force' => true,
            ]) === 0) {
            $this->info('✅ Config file published.');
            return true;
        }

        $this->error('❌ Failed to publish config file.');
        return false;
    }

    protected function runMigrations(): bool
    {
        $this->line('📂 <fg=yellow>Running migrations...</>');

        $migrationPath = realpath(__DIR__ . '/../../Database/Migrations');

        if (!$migrationPath || !is_dir($migrationPath)) {
            $this->error('❌ Migration path does not exist or is incorrect.');
            return false;
        }

        if ($this->call('migrate', [
                '--path' => $migrationPath,
                '--realpath' => true,
            ]) === 0) {
            $this->info('✅ Migrations completed.');
            return true;
        }

        $this->error('❌ Migration failed.');
        return false;
    }

    protected function runSeeder(): bool
    {
        $this->line('🌱 <fg=yellow>Seeding database...</>');

        $seederClass = '\Denason\IranLocation\Database\Seeders\IranLocationSeeder';

        if (!class_exists($seederClass)) {
            $this->warn('⚠️ Seeder class not found. Skipping...');
            return true;
        }

        if ($this->call('db:seed', ['--class' => $seederClass]) === 0) {
            $this->info('✅ Seeding completed.');
            return true;
        }

        $this->error('❌ Seeding failed.');
        return false;
    }
}
