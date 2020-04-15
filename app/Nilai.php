<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $guarded = [];
    
    public function siswa()
    {
        return $this->belongsTo('App\Data_siswa', 'user_id');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel', 'mapel_id');
    }
}
