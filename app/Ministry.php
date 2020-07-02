<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    //

    protected $table = 'ministries_profile';
    public function expense(){
       return $this->hasMany(Expense::class);
    }
}
