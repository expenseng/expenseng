<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = [
        "amount", "org_name",
        "code", "year", "classification"
    ];

}
