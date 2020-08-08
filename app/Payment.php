<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use NumberFormatter;
use App\Ministry;
use Laravel\Scout\Searchable;

class Payment extends Model
{
    use Searchable;

protected $guarded = ['id'];

    public function amount(){
        return number_format($this->amount, 2, '.', ',');
    }

    /**
     * Return ministry name;
     */
    public function ministry(){
        $ministryCode = substr($this->payment_code, 0, 4); //ministry code is first 4 digits in a payment code
        $ministry_check = Ministry::where('code', 'LIKE', "$ministryCode%")->first();
        if($ministry_check){
        $ministry = $ministry_check->only(['shortname', 'name','cabinet','twitter']);
        }else{
            $ministry = null;
        }
        return $ministry; //return array keyed ['name' => '', 'shortname' => '']
    }

    /**
     * Get related ministry
     */
    public function getRelatedMinistry(){
        $ministryCode = substr($this->payment_code, 0, 4); //ministry code is first 4 digits in a payment code
        // return $this->belongsTo(Ministry::class)->where('');
    }



    /**
     * Return Organizations name ie. MDAs;
     */
    public function organization(){
        $ministryCode = substr($this->payment_code, 0, 4); //ministry code is first 4 digits in a payment code
        $ministry_check = Ministry::where('code', 'LIKE', "$ministryCode%")->get()->first();

        if($ministry_check){
            $organization = $ministry_check['name'];
        }else{
            $organization = $this->organization;
        }
        return $organization; //return array keyed ['name' => '', 'shortname' => '']
    }

    public function company(){
        $company = Company::select('*')
                   ->where('name', $this->beneficiary)
                   ->get();
        return $company;
    }
}
