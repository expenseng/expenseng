<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable =[
        'firstName',
        'lastName',
        'ministry_id',
        'position',
        'isApprove',
    ];

}
