<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Jadwal;
use App\Data_siswa;
use App\Mapel;
use PDF;

class JadwalController_Guru extends Controller
{
    public function index() 
    {
        $kelas = Kelas::orderBy('kelas', 'ASC')->get();
        return view('guru.jadwal', compact('kelas'));
    }

    public function kelas($kelas_id)
    {
        $mapel = Mapel::orderBy('kode_mapel', 'ASC')->get();
        $kelas = Kelas::find($kelas_id);
        $jadwal = Jadwal::where('kelas_id', $kelas_id)->get();
        return view('guru.jadwal_kelas', compact('kelas', 'jadwal', 'mapel'));
    }

    public function save_jadwal(Request $request, $kelas_id) 
    {
        $this->validate($request, [
            'jam' => 'required',
        ]);
        
        try {
            Jadwal::create([
                'kelas_id' => $request->kelas_id,
                'jam' => $request->jam,
                'senin' => $request->senin,
                'selasa' => $request->selasa,
                'rabu' => $request->rabu,
                'kamis' => $request->kamis,
                'jumat' => $request->jumat,
                'sabtu' => $request->sabtu
            ]);

            alert()->success('Berhasil','Data Berhasil DiTambah!');
            return redirect('guru/jadwal/'.$kelas_id);
        } catch(\Exception $e) {
            return redirect('guru/jadwal/'.$kelas_id)->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($kelas_id, $id)
    {
        $mapel = Mapel::orderBy('kode_mapel', 'ASC')->get();
        $kelas = Kelas::find($kelas_id);
        $jadwal = Jadwal::find($id);
        return view('guru.jadwal_edit', compact('mapel', 'kelas', 'jadwal'));
    }

    public function update(Request $request, $kelas_id, $id) 
    {
        // dd($request->all());
        $this->validate($request, [
            'jam' => 'required',
        ]);
        
        try {
            $jadwal = Jadwal::find($id);
            $jadwal->update([
                'jam' => $request->jam,
                'senin' => $request->senin,
                'selasa' => $request->selasa,
                'rabu' => $request->rabu,
                'kamis' => $request->kamis,
                'jumat' => $request->jumat,
                'sabtu' => $request->sabtu
            ]);
            alert()->success('Berhasil','Data Berhasil DiUpdate!');
            return redirect('guru/jadwal/'.$kelas_id);
        } catch(\Exception $e) {
            return redirect('guru/jadwal/'.$kelas_id)->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($kelas_id, $id)
    {
        $jadwal= Jadwal::find($id);
        $jadwal->delete();
        alert()->success('Berhasil','Data Berhasil DiHapus!');
        return redirect('guru/jadwal/'.$kelas_id);
    }

    public function cetak_pdf(Request $request, $kelas_id)
    {
    $mapel = Mapel::orderBy('kode_mapel', 'ASC')->get();
    $kelass = Kelas::find($kelas_id);
    $jadwal = Jadwal::where('kelas_id', $kelas_id)->get();
    $kelas = $kelass -> kelas;
    $guru = $kelass -> guru -> nama;

    $pdf = PDF::loadview('guru.jadwal_pdf', compact('mapel', 'jadwal', 'kelas', 'guru'));
    return $pdf->download('jadwal kelas - '. $kelas);
    }
}
