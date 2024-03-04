<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Coach extends Model
{
    use SoftDeletes;

    protected $dates = ["deleted_at"];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function articles(){
        return $this->hasMany('App\Article');
    }

    public function formations(){
        return $this->hasMany('App\Formation');
    }

    public function consultations(){
        return $this->hasMany('App\Consultation');
    }
}
