<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    //the corresponding table returns data from the EXPENDITURE xcel file

    protected $table = "EconomicExpenditure"; //this is the name of the table in the DB
}
