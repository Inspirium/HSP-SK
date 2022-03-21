<?php

namespace Inspirium\Console\Commands;

use Illuminate\Console\Command;
use Inspirium\Models\WorkOrder;

class FixWorkOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hsp:fix:workorder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = WorkOrder::doesntHave('thread')->get();
        foreach($orders as $order) {
            $order->assignNewThread();
        }
    }
}
