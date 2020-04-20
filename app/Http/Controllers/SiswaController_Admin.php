<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_siswa;
use App\Kelas;

class SiswaController_Admin extends Controller
{
    public function index()
    {
        $siswa = Data_siswa::paginate(10);
        return view('admin.siswa', compact('siswa'));
    }

    public function dataSiswa()
    {
        $siswa = Data_siswa::orderBy('nisn', 'ASC')->with('kelas')->get();
        return datatables($siswa)->addColumn('action', function ($siswa) {
            return '<a href="/admin/siswa/' .$siswa -> id.'/edit" class="btn btn-warning btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                    <a href="/admin/siswa/'. $siswa -> id.'" onclick="javascript:return confirm(\'Anda Yakin Ingin Menghapus?\');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
        })->addColumn('kelas', function (Data_siswa $siswa) {
            return $siswa->kelas->kelas;
        })->addColumn('status', function (Data_siswa $siswa) {
            if (empty($siswa->user)) {
                return '<button class="btn  btn-xs btn-rounded btn-danger disabled">Tidak Aktif</button>';
            } else {
                return '<a href ="" class="btn  btn-xs btn-rounded btn-info disabled">Aktif</a>';
            }
        })->addIndexColumn()->rawColumns(['status','action', 'confirmed'])->toJson();
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
            return redirect()->route('admin.siswa');
        } catch(\Exception $e) {
            alert()->error('Gagal','Data Gagal Ditambah!');
            return redirect()->route('admin.siswa')->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $kelass = Kelas::orderBy('kelas', 'ASC')->get();
        $siswa = Data_siswa::find($id);
        return view('admin.siswa_edit', compact('siswa', 'kelass'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
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

            alert()->success('Berhasil','Data Berhasil Diubah!');
            return redirect()->route('admin.siswa');
        } catch(\Exception $e) {
            alert()->error('Gagal','Data Gagal Diubah!');
            return redirect()->route('admin.siswa')->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $siswa = Data_siswa::find($id);
        $siswa->delete();
        alert()->success('Berhasil','Data Berhasil Dihapus!');
        return redirect()->route('admin.siswa');
    }
}
