<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nisn', 'email', 'password', 'data_siswa_id', 'job', 'data_guru_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kelas ()
    {
        return $this->hasOne('App\Kelas');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Data_siswa', 'data_siswa_id');
    }

    public function guru()
    {
        return $this->belongsTo('App\Data_guru', 'data_guru_id');
    }
}
