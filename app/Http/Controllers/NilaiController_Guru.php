<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nilai;
use App\Data_siswa;
use App\Mapel;
use DB;
use PDF;

class NilaiController_Guru extends Controller
{
    public function index()
    {
        $siswa = Data_siswa::orderBy('nisn', 'ASC')->get();
        return view('guru.nilai', compact('siswa'));
    }

    public function info($user_id)
    {
        $siswa = Data_siswa::find($user_id);
        $mapel = Mapel::all();
        $nilai = Nilai::where('user_id', $user_id)->get();
        return view('guru.nilai_info', compact('siswa', 'mapel', 'nilai'));
    }

    public function save_nilai(Request $request, $id) 
    {
        // $user = DB::table('nilais')->select('user_id')->where('id', $id)->first();
        $this->validate($request, [
            'mapel_id' => 'required',
            'uts' => 'required',
            'uas' => 'required',
            'keterangan' => 'required'
        ]);
        
        try {
            Nilai::create([
                'user_id' => $request->id,
                'mapel_id' => $request->mapel_id,
                'uts' => $request->uts,
                'uas' => $request->uas,
                'keterangan' => $request->keterangan
            ]);
            alert()->success('Berhasil','Data Berhasil DiTambah!');
            return redirect('guru/nilai/'.$id);
        } catch(\Exception $e) {
            return redirect('guru/nilai/'.$id)->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($user_id, $id)
    {
        $nilai = Nilai::find($id);
        $siswa = Data_siswa::find($user_id);
        return view('guru.nilai_edit', compact('nilai', 'siswa'));
    }

    public function update(Request $request, $user_id, $id) 
    {
        // dd($request->all());
        $this->validate($request, [
            'uts' => 'required',
            'uas' => 'required',
            'keterangan' => 'required'
        ]);
        
        try {
            $nilai = Nilai::find($id);
            $nilai->update([
                'uts' => $request->uts,
                'uas' => $request->uas,
                'keterangan' => $request->keterangan
            ]);
            alert()->success('Berhasil','Data Berhasil DiUpdate!');
            return redirect('guru/nilai/'.$user_id);
        } catch(\Exception $e) {
            return redirect('guru/nilai/'.$user_id)->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($user_id, $id)
    {
        $nilai= Nilai::find($id);
        $nilai->delete();
        alert()->success('Berhasil','Data Berhasil DiHapus!');
        return redirect('guru/nilai/'.$user_id);
    }

    public function cetak_pdf(Request $request, $user_id)
    {
    $siswa = Data_siswa::find($user_id);
    $mapel = Mapel::all();
    $nilai = Nilai::where('user_id', $user_id)->get();
    $nama = $siswa->nama; 
    $kelas = $siswa->kelas->kelas;

    $pdf = PDF::loadview('guru.nilai_pdf', compact('kelas', 'nama', 'nilai'));
    return $pdf->download('nilai siswa - ' . $nama );
    }
}
