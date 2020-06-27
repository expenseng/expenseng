<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    //the corresponding table returns data from the REVENUES xcel file

    protected $table = "EconomicRevenue"; //this is the name of the table in the DB
}
