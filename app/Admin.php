<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   public function vehicles(){
        return $this->belongsToMany('App\Vehicle');
}
}