<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    //

    
    protected $fillable = [
        'code', 
        'name', 
        'shortname',
        'twitter_handle', 
        'website',
        'sector_id'
    ];

    // public function expense()
    // {
    //    return $this->hasMany(Expense::class, 'payer_code', 'code');
    // }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function cabinet()
    {
        return $this->hasMany(Cabinet::class, 'ministry_code', 'code');
    }
}
