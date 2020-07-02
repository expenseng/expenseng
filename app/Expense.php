<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //
    public function details(){
       return $this->belongsToMany('App\Company');
    }

 
}
