<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_guru;

class GuruController_siswa extends Controller
{
    public function index()
    {
        $guru = Data_guru::all();
        return view('siswa.guru', compact('guru'));
    }
}
