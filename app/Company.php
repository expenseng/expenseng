<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use stdClass;

class Company extends Model
{
    use Searchable;

    public $fillable = ['name', 'shortname', 'industry', 'ceo', 'twitter'];

    //table name is now contractors
    protected $table = 'contractors';

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
    public function contractorType()
    {
        //type column is an integer 
        return $this->hasOne(CompanyType::class, 'id', 'type');
    }

    public function isGovtEntity()
    {

        if (! $this->contractorType){
            return false;
        }
        
        $data = $this->contractorType->first();

        return $data->name == "Government Official" || 
                $data->name == "Government Parastatal";

    }
}
