<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GovernmentFunction extends Model
{
    //the corresponding table returns data from the FUNCTIONS OF GOVERNMENT excel file

    protected $table = "GovernmentFunctions"; //this is the name of the table in the DB
}
