<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    public function users(){
        return $this->hasOne('App\User');
    }

    public function borrow_details(){
        return $this->hasMany('App\Borrow_detail');
    }
}
