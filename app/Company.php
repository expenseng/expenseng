<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    public function expense()
    {
        return $this->hasMany(Expense::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * Helper methods
     */
    public function shortname(){
        /***
         * Return only the first word if the word is greater than 10
         * Return the entire word in lowercase with spaces removed otherwise
         */
        return strlen($this->name) > 10 ? 
                explode(" ", $this->name)[0] : strtolower(str_replace(" ", "", $this->name));
    }
}
