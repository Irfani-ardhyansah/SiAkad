<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_guru extends Model
{
    
    protected $guarded = [];
    protected $fillable = [
        'nip', 'nama', 'avatar', 'alamat', 'gender', 'tanggal_lahir', 'tempat_lahir', 'no_hp'
    ];

    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('images_guru/default.png');
        }

        return asset('images_guru/'. $this->avatar);
    }

    public function class()
    {
        return $this->hasMany('App\Kelas');
    }

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function jadwal()
    {
        return $this->hasMany('App\Jadwal');
    }

    public function mapel()
    {
        return $this->hasMany('App\Mapel');
    }
}
