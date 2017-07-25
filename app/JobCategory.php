<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    protected $table="jobs_categories";
    protected $fillable=[
        'name',
        'status',
    ];
}
