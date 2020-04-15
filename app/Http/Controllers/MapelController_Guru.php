<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;

class MapelController_Guru extends Controller
{
    public function index() 
    {
        $mapel = Mapel::get();
        return view('guru.mapel', compact('mapel'));
    }

    public function save(Request $request) 
    {
        $this->validate($request, [
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
        ]);

        
        try {
            $mapel = Mapel::create([
                'kode_mapel' => $request->kode_mapel,
                'nama_mapel' => $request->nama_mapel,
            ]);
            alert()->success('Berhasil','Data Berhasil DiTambah!');
            return redirect()->route('guru.mapel');
        } catch(\Exception $e) {
            return redirect()->route('guru.mapel')->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $mapel = Mapel::find($id);
        return view('guru.mapel_edit', compact('mapel'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
        ]);

        
        try {
            $mapel = Mapel::find($id);
            $mapel->update([
                'kode_mapel' => $request->kode_mapel,
                'nama_mapel' => $request->nama_mapel,
            ]);
            alert()->success('Berhasil','Data Berhasil DiUpdate!');
            return redirect()->route('guru.mapel');
        } catch(\Exception $e) {
            return redirect()->route('guru.mapel')->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $mapel = Mapel::find($id);
        $mapel->delete();
        alert()->success('Berhasil','Data Berhasil DiHapus!');
        return redirect()->route('guru.mapel');
    }
}
