<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function guru()
    {
        return $this->belongsTo('App\Data_guru');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel');
    }
}
