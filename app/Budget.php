<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = [
        "amount", "project_name",
        "code", "year", "classification"
    ];

}
