<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function user() 
    {
        return $this->belongsTo('App\User');
    }

    public function data_siswa()
    {
        return $this->hasMany('App\Data_siswa', 'kelas_id');
    }

    public function guru()
    {
        return $this->belongsTo('App\Data_guru', 'data_guru_id');
    }

    public function jadwal()
    {
        return $this->hasMany('App\Jadwal');
    }
}
