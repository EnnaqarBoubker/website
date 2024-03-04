<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galerie extends Model
{
    use SoftDeletes;

    protected $dates = ["deleted_at"];

    public function coach(){
        return $this->belongsTo('App\Coach');
    }
}
