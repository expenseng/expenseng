<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = [
        'name', 'email', 'facebook', 'linkedin', 'twitter', 'position', 'company_id', 'avatar'
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
  

}
