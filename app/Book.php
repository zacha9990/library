<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function borrow_details(){
        return $this->hasMany('App\Borrow_detail');
    }

    protected $fillable = [
        'kode_buku',
        'judul_buku',
        'tahun_terbit',
        'penulis',
        'stok',
    ];
}
