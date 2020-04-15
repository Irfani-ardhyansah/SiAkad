<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Data_guru;

class KelasController_Admin extends Controller
{
    public function index() 
    {
        $kelas = Kelas::orderBy('kelas', 'ASC')->get();
        $guru = Data_guru::get();
        return view('admin.kelas', compact('kelas', 'guru'));
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

            return redirect()->route('admin.kelas');
        } catch(\Exception $e) {
            return redirect()->route('admin.kelas')->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);
        $guru = Data_guru::orderBy('created_at', 'DESC')->get();
        return view('admin.kelas_edit', compact('kelas', 'guru'));
    }

    public function pilih(Request $request, $id)
    {
        $this->validate($request, [
            'data_guru_id' => 'required|string'
        ]);

        try {
            $kelas = Kelas::find($id);
            $kelas->update([
                'data_guru_id' => $request->data_guru_id
            ]);
            return redirect()->route('admin.kelas');
        } catch(\Exception $e) {
            return redirect()->route('admin.kelas')->with(['error' => $e->getMessage()]);
        }

        
    }

    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->update(['data_guru_id' => null]);
        return redirect()->route('admin.kelas');
    }

    public function delete($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect()->route('admin.kelas');
    }
}
