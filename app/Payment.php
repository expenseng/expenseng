<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use NumberFormatter;
use App\Ministry;

class Payment extends Model
{
    public $fillable = ['name', 'shortname', 'industry', 'ceo', 'twitter'];

    public function amount(){
        return number_format($this->amount, 2, '.', ',');
    }

    /**
     * Return ministry name;
     */
    public function ministry(){
        $ministryCode = substr($this->payment_code, 0, 4); //ministry code is first 4 digits in a payment code
        $ministry_check = Ministry::where('code', 'LIKE', "$ministryCode%")->get();
        if($ministry_check){
        $ministry = $ministry_check[0]->only(['shortname', 'name','cabinet','twitter']);
        }else{
            $ministry = null;
        }
        return $ministry; //return array keyed ['name' => '', 'shortname' => '']
    }
}
