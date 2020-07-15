<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use NumberFormatter;

class Payment extends Model
{
    public function amount()
    {
        return number_format($this->amount, 2, '.', ',');
    }

    /**
     * Return organization details
     */
    public function ministry()
    {
        return $this->belongsTo(Ministry::class, 'organization_id');
    }

}
