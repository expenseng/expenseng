<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdaBudget extends Model
{
    //the corresponding table returns data from the MDA xcel file

    protected $table = "MDABudget"; //this is the name of the table in the DB
}
