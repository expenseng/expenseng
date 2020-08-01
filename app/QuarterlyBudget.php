<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuarterlyBudget extends Model
{
    //
    protected $table = "quaterly_budgets";
    protected $guarded = ['id'];
}
