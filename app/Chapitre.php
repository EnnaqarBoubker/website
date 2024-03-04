<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapitre extends Model
{
    use SoftDeletes;

    protected $dates = ["deleted_at"];

    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }

    public function coach(){
        return $this->belongsTo('App\Coach');
    }


    public function formations(){
        return $this->belongsToMany('App\Formation')->withTimestamps();
    }

    public function courses(){
        return $this->belongsToMany('App\Course')->withTimestamps();
    }

}
