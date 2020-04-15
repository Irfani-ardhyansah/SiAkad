<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nilai;
use App\Data_siswa;
use App\Kelas;
use DB;
use Session;
use PDF;

class NilaiController_siswa extends Controller
{
    public function index(Request $request)
    {   
        $siswa_id = $request->user()->data_siswa_id;
        $nilai = Nilai::where('user_id', $siswa_id)->get();
        return view('siswa.nilai', compact('nilai'));
    }

    public function cetak_pdf(Request $request)
    {
        $siswa_id = $request->user()->data_siswa_id;
        $nilai = Nilai::where('user_id', $siswa_id)->get();

        //mengambil id kelas di data_siswa
        $data = Data_siswa::where('id', $siswa_id)->get();
        foreach($data as $dat)
        //mengambil data nama
        $nama = ($dat->nama);
        $kelas_id = ($dat->kelas_id); 
        //mengamnil kelas id
        $kelas_id = Kelas::where('id', $kelas_id)->get('kelas');
        //mengambil data kelas dari id diatas
        foreach ($kelas_id as $as)
        $kelas = $as->kelas;

        $pdf = PDF::loadview('siswa.nilai_pdf', compact('nilai', 'nama', 'kelas'));
        return $pdf->download('nilai - '.$nama);
    }
}
