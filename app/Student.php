<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $dates = ["deleted_at"];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function formations(){
        return $this->hasMany('App\Formation')->withTimestamps();
    }
}
