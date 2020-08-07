<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $fillable = [
        'name', 
        'twitter_handle',
        'facebook_handle',
        'instagram',
        'linkedIn_handle',
        'role',
        'avatar', 
        
    ];
    
    
}
