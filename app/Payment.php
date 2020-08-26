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
}
