<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    //
    protected $fillable = ['name', 'title', 'description'];

    public function city(){
      return $this->belongsTo('App\City');
    }
}
