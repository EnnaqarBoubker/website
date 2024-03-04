<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formation extends Model
{
    use SoftDeletes;

    protected $dates = ["deleted_at"];

    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }

    public function coach(){
        return $this->belongsTo('App\Coach');
    }

    public function chapitres(){
        return $this->belongsToMany('App\Chapitre')->withTimestamps();
    }

    public function students(){
        return $this->belongsToMany('App\Student')->withTimestamps();
    }

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
