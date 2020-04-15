<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_guru;

class GuruController_Admin extends Controller
{
    public function index()
    {
        $guru = Data_guru::paginate(10);
        return view('admin.guru', compact('guru'));
    }

    public function info($id)
    {
        $guru = Data_guru::find($id);
        return view('admin.guru_info', compact('guru'));
    }

    public function save(Request $request) 
    {
        $this->validate($request, [
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required|max:13'
        ]);

        
        try {
            $guru = Data_guru::create([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp
            ]);

            if($request->hasFile('avatar')){
                $request->file('avatar')->move('images_guru/', $request->file('avatar')->getClientOriginalName());
                $guru->avatar = $request->file('avatar')->getClientOriginalName();
                $guru->save();
            }

            alert()->success('Berhasil','Data Berhasil Ditambah!');
            return redirect()->route('admin.guru');
        } catch(\Exception $e) {
            alert()->error('Gagal','Data Gagal Ditambah!');
            return redirect()->route('admin.guru')->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $guru = Data_guru::find($id);
        return view('admin.guru_edit', compact('guru'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required|max:13'
        ]);

        try {
            $guru = Data_guru::find($id);
            $guru->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp
            ]);

            if($request->hasFile('avatar')){
                $request->file('avatar')->move('images_guru/', $request->file('avatar')->getClientOriginalName());
                $guru->avatar = $request->file('avatar')->getClientOriginalName();
                $guru->save();
            }

            alert()->success('Berhasil','Data Berhasil DiUbah!');
            return redirect()->route('admin.guru');
        } catch(\Exception $e) {
            alert()->error('Gagal','Data Gagal DiUbah!');
            return redirect()->route('admin.guru')->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $guru = Data_guru::find($id);
        $guru->delete();
        alert()->success('Berhasil','Data Berhasil Dihapus!');
        return redirect()->route('admin.guru');
    }
}
