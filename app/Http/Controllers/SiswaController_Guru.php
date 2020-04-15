<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Data_siswa;
use App\Nilai;

class SiswaController_Guru extends Controller
{
    public function index()
    {
        $kelass = Kelas::orderBy('kelas', 'ASC')->get();
        $siswa = Data_siswa::orderBy('nisn', 'ASC')->get();
        return view('guru.siswa', compact('siswa', 'kelass'));
    }

    public function info($id)
    {   
        $siswa = Data_siswa::find($id);
        $nilai = Nilai::where('user_id', $id)->get();
        return view('guru.siswa_info', compact('siswa' ,'nilai'));
    }

    public function save(Request $request) 
    {
        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'kelas_id' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required|max:13',
            'nama_ortu_wali' => 'required',
            'tanggal_ortu_wali' => 'required',
            'alamat_ortu' => 'required',
            'no_hp_ortu' => 'required|max:13'
        ]);

        
        try {
            $siswa = Data_siswa::create([
                'nisn' => $request->nisn,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'gender' => $request->gender,
                'kelas_id' => $request->kelas_id,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
                'nama_ortu_wali' => $request->nama_ortu_wali,
                'tanggal_ortu_wali' => $request->tanggal_ortu_wali,
                'alamat_ortu' => $request->alamat_ortu,
                'no_hp_ortu' => $request->no_hp_ortu
            ]);

            if($request->hasFile('avatar')){
                $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
                $siswa->avatar = $request->file('avatar')->getClientOriginalName();
                $siswa->save();
            }

            alert()->success('Berhasil','Data Berhasil Ditambah!');
            return redirect()->route('guru.siswa');
        } catch(\Exception $e) {
            alert()->error('Gagal','Data Gagal Ditambah!');
            return redirect()->route('guru.siswa')->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $kelass = Kelas::orderBy('kelas', 'ASC')->get();
        $siswa = Data_siswa::find($id);
        return view('guru.siswa_edit', compact('siswa', 'kelass'));
    }

    public function update(Request $request, $id) 
    {
        // dd($request->all());
        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'kelas_id' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required|max:13',
            'nama_ortu_wali' => 'required',
            'tanggal_ortu_wali' => 'required',
            'alamat_ortu' => 'required',
            'no_hp_ortu' => 'required|max:13'
        ]);
        
        try {
            $siswa = Data_siswa::find($id);
            $siswa->update([
                'nisn' => $request->nisn,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'gender' => $request->gender,
                'kelas_id' => $request->kelas_id,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
                'nama_ortu_wali' => $request->nama_ortu_wali,
                'tanggal_ortu_wali' => $request->tanggal_ortu_wali,
                'alamat_ortu' => $request->alamat_ortu,
                'no_hp_ortu' => $request->no_hp_ortu
            ]);

            if($request->hasFile('avatar')){
                $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
                $siswa->avatar = $request->file('avatar')->getClientOriginalName();
                $siswa->save();
            }

            alert()->success('Berhasil','Data Berhasil DiUbah!');
            return redirect()->route('guru.siswa');
        } catch(\Exception $e) {
            return redirect()->route('guru.siswa')->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $siswa = Data_siswa::find($id);
        $siswa->delete();
        alert()->success('Berhasil','Data Berhasil DiHapus!');
        return redirect()->route('guru.siswa');
    }
}
