<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feedback';

    protected $fillable =[
        'firstName',
        'lastName',
        'ministry_id',
        'sector_id',
        'cabinet_id',
        'position',
        'isApprove',
    ];


    
    

}
