<?php

namespace App\Console\Commands;

use App\Payment;
use Cviebrock\EloquentSluggable\Tests\Models\Post;
use Illuminate\Console\Command;

class MakeSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:slugs {amount?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make';

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
        $amount = (int) $this->argument('amount');
        $this->info('creating slug for payments');
        if ($amount > 0) {
            $payments = Payment::where('slug', null)
                ->orderBy('payment_date', "DESC")
                ->take($amount)->get();
        } else {
            $payments = Payment::where('slug','!=', null)
                ->orderBy('payment_date', "DESC")->get();
        }
        foreach ($payments as $payment) {
            $payment_no = $payment->payment_no;
            $description = $payment->description;
            $slug  = $this->slugify($description, $payment_no);
            $payment->update(['slug' => $slug]);
        }
        $this->info('done');
        return 0;
    }

    private function slugify($description, $code)
    {
        if (!empty($description)) {
            return $code .'-'.str_slug($description);
        } else {
            return $code;
        }
    }
}
