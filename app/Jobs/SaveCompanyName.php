<?php

namespace App\Jobs;

use App\Company;
use App\Payment;
use App\Scrapping;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveCompanyName implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $id;

    /**
     * Create a new job instance.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
        //
    }

    /**
     * Execute the job.
     *
     * @return int
     */
    public function handle()
    {
        //
        $payment = Payment::whereId($this->id)->first();
        $beneficiary = $payment->beneficiary;
        if ($this->check($beneficiary)) {
            /** @var TYPE_NAME $beneficiary */
            switch ($beneficiary) {
                case preg_match("/LIMITED/i", $beneficiary)  != false:
                case preg_match("/LTD/i", $beneficiary)  != false:
                case (preg_match("/SERVICES/i", $beneficiary)  != false) &&
                (preg_match("/FEDERAL/i", $beneficiary) == false):
                case preg_match("/AGENCY/i", $beneficiary)  != false:
                case preg_match("/CONSULT/i", $beneficiary)  != false:
                    $this->logToDb($beneficiary);
                    return 0;
                    break;
                default:
                    return -1;
            }
        }
        return -1;
    }
    public function shortName($name)
    {
        $check_exist = Company::whereShortname(strtolower(explode(" ", $name)[0]))->first();
        if (empty($check_exist)) {
            return strlen($name) > 10 ?
                strtolower(explode(" ", $name)[0]) : strtolower(str_replace(" ", "", $name));
        } else {
            return strlen($name) > 10 ?
                strtolower(explode(" ", $name)[0]."-".explode(" ", $name)[1]) : strtolower(str_replace(" ", "", $name));
        }
    }
    public function logToDb($beneficiary)
    {

        Company::create([
            'name' => $beneficiary,
            'shortname' => $this->shortName($beneficiary),
            'ceo' => $this->getCeo($beneficiary)
        ]);
    }

    public function check($name)
    {
        $check = Company::whereName($name)->first();
        if (empty($check)) {
            return true;
        }
        return false;
    }
    public function getCeo($name)
    {
        $result = Scrapping::checkCompany($name);
        if (($result != false)) {
            foreach ($result as $person) {
                if (strtolower($person['role']) == 'director') {
                    return $person['name'];
                }
            }
        }
        return false;
    }
}
