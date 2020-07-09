<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use stdClass;

class Company extends Model
{
    public $fillable = ['name', 'shortname', 'industry', 'ceo', 'twitter'];
    public function expense()
    {
        return $this->hasMany(Expense::class);
    }

    public function people()
    {
        return $this->hasMany(People::class);
    }

    /**
     * Helper methods
     */
    public function shortname()
    {
        /***
         * Return only the first word if the word is greater than 10
         * Return the entire word in lowercase with spaces removed otherwise
         */
        return strlen($this->shortname) > 10 ?
        explode(" ", $this->shortname)[0] : strtolower(str_replace(" ", "", $this->shortname));
    }

    public function twitterUrl(){
        return "https://twitter.com/" . substr($this->twitter, 1);
    }

    public function contract($year){
        $response = new stdClass();
        $response->amount = 1232345;

        return $response;
    }

    public function people(){
        return $this->hasMany(People::class);
    }

    public function getRouteKeyName()
    {
        return 'shortname';
    }
}
