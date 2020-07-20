<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','password'
    ];
}
