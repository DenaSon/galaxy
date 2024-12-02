<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendLogEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-log-email';

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

        try {
            $logFile = storage_path('logs/laravel.log');


            if (File::exists($logFile)) {

                $logContent = File::get($logFile);


                Mail::send([], [], function ($message) use ($logContent) {
                    $message->to(getSetting('admin_email') ?? 'info@denapax.com')
                        ->subject('Laravel Log File')
                        ->setBody('<pre>' . e($logContent) . '</pre>', 'text/html'); // HTML body
                });

                $this->info('Log file has been sent via email.');
            } else {
                $this->error('Log file does not exist.');
            }
        }
        catch (Throwable $e)
        {
            Log::debug($e->getMessage());
        }

    }
}
