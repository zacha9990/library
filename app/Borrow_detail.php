<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow_detail extends Model
{
    public function borrow(){
        return $this->belongsTo('App\Borrow');
    }

    public function book(){
        return $this->belongsTo('App\Book');
    }
}
