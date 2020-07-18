<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = [
        'name'
    ];
    public function ministry()
    {
        return $this->hasMany(Ministry::class);
    }
}
