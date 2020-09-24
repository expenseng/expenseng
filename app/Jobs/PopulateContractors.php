<?php

namespace App\Jobs;

use App\Company;
use App\Payment;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/***
 * This job will be run on a live server to populate the contractors
 * table with existing records from the payments table.
 */
class PopulateContractors implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /**
         * Empty the contractors table
         */
        Company::truncate();

        /**
         * Populate with existing content from payments table
         * We may have thousands of records so we will get them
         * in chunks of 200
         */
        Payment::chunk(
            200, function ($payments) {
                foreach ($payments as $payment) {
                    if (! $this->companyExists($payment->beneficiary)) {
                        Company::create(
                            [
                                'name' => $payment->beneficiary,
                                'shortname' => $this
                                    ->uniqueShortName($payment->beneficiary),
                            ]
                        );
                    }
                }
        });
    }

    /**
     * Generate a unique shortname for each company
     * 
     * @param $name name of company
     * @return string the unique url stringified version of name
    */
    public function uniqueShortName($name)
    {
        return Str::slug($name). "-" . rand(1000, 9999);
    }

    /**
     * Check if company exists
     * @param $shortname shortname of the compayn
     * @return bool 
     */
    public function companyExists($shortname)
    {
        return Company::whereShortname(
            $this->uniqueShortName($shortname)
        )->count() > 0;
    }
}
