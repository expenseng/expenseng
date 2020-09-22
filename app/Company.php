<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use stdClass;

class Company extends Model
{
    use Searchable;

    public $fillable = ['name', 'shortname', 'industry', 'ceo', 'twitter'];
    public function expense()
    {
        return $this->hasMany(Expense::class);
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

    public function twitterUrl()
    {
        return "https://twitter.com/" . substr($this->twitter, 1);
    }

    public function contract($year)
    {
        $response = new stdClass();
        $response->amount = 1232345;

        return $response;
    }

    public function people()
    {
        return $this->hasMany(People::class);
    }

    public function approvedPeople(){
        return $this->people()->where('approved', '1')->get();
    }

    public function getRouteKeyName()
    {
        return 'shortname';
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'beneficiary', 'name');
    }

    /**
     * Define relationship for a 
     * company type
     */
    public function type()
    {
        return $this->hasOne(CompanyType::class, 'contractor_id', 'id');
    }

    public function isGovtEntity()
    {
        if(!$this->type){
            return false;
        } 

        $data = $this->type->first();

        $govt = $data->govt_official;
        $govtOrg = $data->govt_organization;
        $person = $data->individual;
        $company = $data->company;

        //if any of the govt labels have a higher vote than private labels
        return $govt > max($person, $company) || $govtOrg > max($person, $company);    
    }
}
