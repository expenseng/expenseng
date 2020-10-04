<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use NumberFormatter;
use App\Ministry;
use Illuminate\Support\Str;
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
        return Ministry::where('code', 'LIKE', Str::substr($this->payment_code, 0, 4) . "%")->first();
       
        // $ministryCode = substr("{$this->payment_code}", 0, 4); //ministry code is first 4 digits in a payment code
        // $ministry = Ministry::where('code', 'LIKE', "$ministryCode%")->first();

        return $ministry; //return array keyed ['name' => '', 'shortname' => '']
    }

    /**
     * Return Organizations name ie. MDAs;
     */
    public function organization(){
        $ministryCode = substr($this->payment_code, 0, 4); //ministry code is first 4 digits in a payment code
        $ministry = Ministry::where('code', 'LIKE', "$ministryCode%")->get()->first();

        return $ministry; //return array keyed ['name' => '', 'shortname' => '']
    }

    public function company(){
        $company = Company::select('*')
                   ->where('name', $this->beneficiary)
                   ->get();
        return $company;
    }


     public function slug()
    {
        /***
         * custom slugify method for beneficiaries
         * some beneficiary names contain special characters which are not suppose to  part of a supposedly human friendly uri
         */

        // If any of the these characters is found from the right - a substring is created which is now use as the slug
        $chars = strtok($this->beneficiary, '(\'-');
        if ($chars){
             return strtolower(preg_replace('~[^A-Za-z0-9?.:!]~','-', $chars));
        }

        $slug = preg_replace('~[^A-Za-z0-9?.:!]~','-', $this->beneficiary);
        return strtolower($slug);
    }

    public function getRouteKeyName()
    {
        return 'payment_no';
    }
    public function files()
    {
        return $this->morphMany('App\Files', 'owner');
    }

    // public function
}
