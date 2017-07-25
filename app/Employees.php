<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model{


    protected $table="employees";
    protected $fillable=[
        'user_id',
        'organizations_id',
        'designations_id',
        'jobs_categories_id',
        'countries_id',
        'salary',
        'job_nature',
        'job_location',
        'is_still_working',
        'joining_date',
        'leaving_date',
        'overview',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function organizations(){
        return $this->belongsTo('App\Organizations');
    }
    public function feedback(){
        return $this->hasMany('App\Feedback');
    }



}
