<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $fillable = [
        'name', 
        'twitter_handle',
        'facebook_handle',
        'email',
        'linkedIn_handle',
        'role',
        'avatar', 
        
    ];
    
    
}
