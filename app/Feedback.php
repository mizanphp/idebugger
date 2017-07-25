<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table="feedbacks";
    protected $fillable=[
        'employees_id',
        'message',
        'rating_feedback',
        'organizations_id',
        'form_id',
        'to_id',

    ];
}
