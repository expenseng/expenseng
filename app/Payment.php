<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use NumberFormatter;
use App\Ministry;

class Payment extends Model
{
    public function amount(){
        return number_format($this->amount, 2, '.', ',');
    }

    /**
     * Return ministry name;
     */
    public function ministry(){
        $ministryCode = substr($this->payment_code, 0, 4); //ministry code is first 4 digits in a payment code
        $ministry = Ministry::where('code', 'LIKE', "$ministryCode%")->get()[0]->only(['shortname', 'name']);
        return $ministry; //return array keyed ['name' => '', 'shortname' => '']
    }
}
