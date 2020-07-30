<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    protected $fillable = [
        'name', 
        'twitter_handle',
        'role',
        'avatar', 
        'ministry_code', 
    ];
    
    public function ministries()
    {
        return $this->belongsTo(Ministry::class, 'id', 'ministry_id');
    }
}
