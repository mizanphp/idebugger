<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizations extends Model
{
    protected $table="organizations";
    protected $fillable=[
        'user_id',
        'countries_id',
        'jobcategory_id',
        'name',
        'logo',
        'phone',
        'address',
        'sublocality',
        'district',
        'division',
        'postal_code',
        'lat',
        'lng',
        'email',
        'descriptions',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function employees(){
        return $this->hasMany('App\Employees');
    }


    public function feedback(){
        return $this->hasMany('App\Feedback');
    }


}
