<?php

namespace App\Jobs;

use App\Company;
use App\Payment;
use App\Scrapping;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveCompanyName implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $_id;

    /**
     * Create a new job instance.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->_id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        //get company name from the payment table
        $payment = Payment::whereId($this->_id)->first();
        $beneficiary = $payment->beneficiary;
        
        if (Company::whereShortname(Str::slug($beneficiary))->count() == 0) {
            $this->logToDb($beneficiary);
        }
    }

    /**
     * Create a new company from the payments record
     * 
     * @param string $beneficiary the payment beneficiary name
     */
    public function logToDb($beneficiary)
    {

        $create = Company::create(
            [
                'name' => $beneficiary,
                'shortname' => $this->uniqueShortName($beneficiary),
            ]
        );

        // send a job to the queue Ceo search to get name of ceo for the company
        CeoNameSearch::dispatch($create->id)->onQueue('ceoSearch');
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
}
