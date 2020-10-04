<?php

namespace App\Console\Commands;

use App\Payment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class JoinMinistryToPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ministry:payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add ministry to payment table';

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
        
        $this->info('Add ministry code to payments table cron is running');
        $payments = Payment::whereNull('ministry_code')->get();

        foreach ($payments as $payment) {
            try {
                if (!$payment->ministry_code) {
                    $ministry_code = substr($payment->payment_code, 0, 4);
                    $payment->ministry_code = $ministry_code;
    
                    $payment->save();
    
                    $this->info('Ministry code added successfully');
                }
            } catch (\Throwable $th) {
                //throw $th;
                $this->info('No ministry found');
            }
        }
        $this->info('Job completed');
        return 0;
    }
}
