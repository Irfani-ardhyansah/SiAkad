<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $guarded = [];

    public function nilai()
    {
        return $this->hasMany('App\Nilai');
    }

    public function jadwal()
    {
        return $this->hasMany('App\Jadwal');
    }

    public function guru()
    {
        return $this->belongsTo('App\Data_guru');
    }
}
