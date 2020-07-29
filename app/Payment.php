<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use NumberFormatter;
use App\Ministry;

class Payment extends Model
{


    public $fillable = ['payment_no'	,'payment_code'	,'organization'	,'beneficiary'	,'amount','description', 'payment_date'];
    // public $fillable = ['name', 'shortname', 'industry', 'ceo', 'twitter'];

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
}
