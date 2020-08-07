<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Budget extends Model
{
    use Searchable;
    
    protected $fillable = [
        "amount", "org_name",
        "code", "year", "classification"
    ];

}
