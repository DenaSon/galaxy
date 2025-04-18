<?php



namespace App\Console\Commands;

use Illuminate\Console\Command;

class tilp extends Command
{
    protected $signature = 'tilp';
    protected $description = 'Install and remove denason/iran-location repeatedly';

    public function handle()
    {
        $this->info("Installing package...");
        exec('composer require denason/iran-location 2>&1', $out1);
        $this->output->writeln($out1);

        sleep(5); // یکم مکث برای اطمینان

        $this->info("Removing package...");
        exec('composer remove denason/iran-location 2>&1', $out2);
        $this->output->writeln($out2);

        $this->info("All done.");
    }
}
