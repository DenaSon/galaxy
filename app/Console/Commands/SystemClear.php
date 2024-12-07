<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SystemClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:system-clear';

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
        try {
            $orderIds = Order::where('payment_status', 'pending')
                ->where('created_at', '<', Carbon::now()->subHours(2))
                ->pluck('id');

            if ($orderIds->isEmpty()) {

                $this->info('Orders not found!');
                return;
            }

            DB::table('order_items')->whereIn('order_id', $orderIds)->delete();

            Order::whereIn('id', $orderIds)->delete();
            $this->info('System cleared Successfully!');
        }
        catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
