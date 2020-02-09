<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow_detail extends Model
{
    public function borrows(){
        return $this->hasOne('App\Borrow');
    }

    public function books(){
        return $this->hasOne('App\Book');
    }
}
