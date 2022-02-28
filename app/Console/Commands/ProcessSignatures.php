<?php

namespace Inspirium\Console\Commands;

use Illuminate\Console\Command;
use Inspirium\Models\Signature;
use Inspirium\Notifications\WorkOrderSignatureRequested;

class ProcessSignatures extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hsp:signatures';

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
        $orders = [];
        $signatures = Signature::whereNull('signed')->orderBy('order')->get();
        foreach ($signatures as $signature) {
            if (in_array($signature->work_order_id, $orders)) {
                continue;
            }
            if ($signature->sent_notification) {
                $orders[] = $signature->work_order_id;
                continue;
            }
            $signature->load(['workOrder']);
            if ($signature->workOrder) {
                $signature->employee->notify(new WorkOrderSignatureRequested($signature->workOrder));
            } else {
                //dd($signature->id);
            }
        }
    }
}
