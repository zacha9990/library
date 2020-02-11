<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Borrow_detail;

class Borrow extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function borrow_details(){
        return $this->hasMany('App\Borrow_detail');
    }

    public static function showBooks($id){
        $borrows = Borrow_detail::whereBorrow_id($id)->get();

        return $borrows;
    }
}
