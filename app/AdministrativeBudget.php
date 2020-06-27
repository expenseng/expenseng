<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdministrativeBudget extends Model
{
    //the corresponding table includes the data parsed from the SECTORS in the monthly Administrative Excel file
    
    protected $table = "AdministrativeBudget"; //this is the name of the table in the DB
}
