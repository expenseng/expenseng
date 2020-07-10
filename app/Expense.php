<?php

namespace App;

use NumberFormatter;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /**
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'amount_spent',
        'year',
        'month',
        'project'
    ];

    public function amount(){
        $fmt = new NumberFormatter( 'en_NG', NumberFormatter::CURRENCY );
        return $fmt->formatCurrency($this->amount_spent, "NGN");
    }
}
