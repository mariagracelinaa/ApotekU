<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    // public function transactions()
    // {
    //     return $this->hasMany('App\Laporan','pembeli_id','id');
    // }

    protected $fillable = [
        'name', 'address', 'telepon', 'user_id',
    ];

    public $timestamps = false;
}
