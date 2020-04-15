<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Kelas;
use App\Data_siswa;
use PDF;

class JadwalController_Siswa extends Controller
{
    public function index(Request $request)
    {
        //Mendapatkan id siswa
        $siswa_id = $request->user()->data_siswa_id;
        //memanggil data siswa dengan id tadi
        $data = Data_siswa::where('id', $siswa_id)->get();
        //mengambil id kelas di data_siswa
        foreach($data as $dat)
        $kelas_id = ($dat->kelas_id); 
        //memanggil data jadwal dengan kelas_id
        $jadwal = Jadwal::where('kelas_id', $kelas_id)->get();
        //memanggil data kelas dengan id dari kelas_id
        $kelas_id = Kelas::where('id', $kelas_id)->get('kelas');
        //mengambil data kelas dari id diatas
        foreach ($kelas_id as $as)
        $kelas = $as->kelas;
        return view('siswa.jadwal', compact('jadwal', 'kelas'));
    }

    public function cetak_pdf(Request $request)
    {
    //Mendapatkan id siswa
    $siswa_id = $request->user()->data_siswa_id;
    //memanggil data siswa dengan id tadi
    $data = Data_siswa::where('id', $siswa_id)->get();
    //mengambil id kelas di data_siswa
    foreach($data as $dat)
    $kelas_id = ($dat->kelas_id); 
    //memanggil data jadwal dengan kelas_id
    $jadwal = Jadwal::where('kelas_id', $kelas_id)->get();
    //memanggil data kelas dengan id dari kelas_id
    $kelas_id = Kelas::where('id', $kelas_id)->get('kelas');
    //mengambil data kelas dari id diatas
    foreach ($kelas_id as $as)
    $kelas = $as->kelas;

    $pdf = PDF::loadview('siswa.jadwal_pdf', compact('jadwal', 'kelas'));
    return $pdf->download('jadwal kelas - '.$kelas);
    }
}
