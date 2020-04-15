<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Data_guru;
use Hash;

class AktivasiController_Guru extends Controller
{
    public function index()
    {
        return view('auth.aktivasiGuru');
    }

    public function aktivasi(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required|string', //VALIDASI KOLOM USERNAME
            'password' => 'required|string',
            'repassword' => 'required|string',
        ]);

        if($request->password == $request->repassword) {
        //Mendapatkan id dari nisn yang diinputkan
        $login = [
            'nisn' => $request->nisn,
            'email' => $request->email,
            'password' => $request->password,
            'repassword' => $request->repassword            
        ];
        $data = Data_guru::where('nip', $login)->get('id');

        //mengecek apakah NIP sudah diinputkan admin
        if(sizeof($data) > 0) {
            //memecah array
            foreach ($data as $as)
            //mengambil data dari array 
            $data_id = ($as->id);
        } else {
            return redirect()->route('aktivasiGuru')->with(['error' => 'NIP Belum Terinput Oleh Admin']);
        }

        //merubahnya menjadi string
        $data_guru_id = (string)$data_id; 
        $data_cek = User::where('data_guru_id', $data_guru_id)->count();
        
        //validasi data apakah ada duplikat dan proses membuat akun
        if($data_cek > 0) {
            return redirect()->route('aktivasiGuru')->with(['error' => 'NIP Sudah Terdaftar!']);
        } else {
            try {
                User::create([
                    'nisn' => $request->nisn,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'data_guru_id' => $data_guru_id,
                    'job' => 'Guru'
                ]);
                return redirect()->route('login');
            } catch(\Exception $e) {
                return redirect()->route('aktivasiGuru')->with(['error' => $e->getMessage()]);
            }
        }
    } else {
        return redirect()->route('aktivasiGuru')->with(['error' => 'Email/Password salah!']);
    }

    }
}
