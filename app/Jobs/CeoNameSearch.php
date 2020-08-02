<?php

namespace App\Jobs;

use App\Company;
use App\People;
use App\Scrapping;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CeoNameSearch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $company = Company::whereId($this->id)->first();
        $updated = Company::whereId($this->id)->update(['ceo' => $this->getCeo($company->name) ?
            $this->getCeo($company->name) : null]);
        if ($updated) {
            return ;
        } else {
            return -1;
        }
    }
    public function getCeo($name)
    {
        $result = Scrapping::checkCompany($name);
        if (($result != false)) {
            foreach ($result as $person) {
                People::create(['name'=>$person['name'],'position'=>$person['role'],'company_id'=>$this->id]);
            }
            foreach ($result as $person) {
                if (strtolower($person['role']) == 'director') {
                    return $person['name'];
                }
            }
        }
        return false;
    }
}
