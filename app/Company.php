<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = 'companies_profile';
    public function expense()
    {
        return $this->hasMany(Expense::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
