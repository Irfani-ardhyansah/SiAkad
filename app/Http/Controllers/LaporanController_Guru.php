<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Data_guru;

class LaporanController_Guru extends Controller
{
    public function index()
    {
        $kelas = Kelas::orderBy('kelas', 'ASC')->get();
        $guru = Data_guru::get();
        return view('guru.laporan', compact('kelas', 'guru'));
    }
}
