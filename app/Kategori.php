<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // kategori bisa melihat banyak produk
    public function obat(){
        return $this->hasMany('App\Obat','kategori_id','id');
    }
    public $timestamps = false;
}
