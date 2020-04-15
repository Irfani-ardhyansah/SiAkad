<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Data_guru;

class KelasController_Guru extends Controller
{
    public function index() 
    {
        $kelas = Kelas::orderBy('kelas', 'ASC')->get();
        $guru = Data_guru::get();
        return view('guru.kelas', compact('kelas', 'guru'));
    }

    public function save(Request $request) 
    {
        $this->validate($request, [
            'kelas' => 'required|string'
        ]);

        try {
            $kelas = Kelas::create([
                'kelas' => $request->kelas
            ]);

            return redirect()->route('guru.kelas');
        } catch(\Exception $e) {
            return redirect()->route('guru.kelas')->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);
        $guru = Data_guru::orderBy('created_at', 'DESC')->get();
        return view('guru.kelas_edit', compact('kelas', 'guru'));
    }

    public function pilih(Request $request, $id)
    {
        $this->validate($request, [
            'guru_id' => 'required|string'
        ]);

        try {
            $kelas = Kelas::find($id);
            $kelas->update([
                'guru_id' => $request->guru_id
            ]);
            return redirect()->route('guru.kelas');
        } catch(\Exception $e) {
            return redirect()->route('guru.kelas')->with(['error' => $e->getMessage()]);
        }

        
    }

    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->update(['guru_id' => null]);
        return redirect()->route('guru.kelas');
    }

    public function delete($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect()->route('guru.kelas');
    }
}
