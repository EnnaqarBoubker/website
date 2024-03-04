<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Pack extends Model
{
    use SoftDeletes;

    protected $dates = ["deleted_at"];

    public function abonnements(){
        return $this->hasMany('App\Abonnement');
    }
}
