<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_siswa extends Model
{
    protected $guarded = [];

    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('images/default.png');
        }

        return asset('images/'. $this->avatar);
    }

    public function nilai()
    {
        return $this->hasMany('app\Nilai', 'user_id');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
}
