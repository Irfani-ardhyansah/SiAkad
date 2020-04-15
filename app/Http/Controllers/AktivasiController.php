<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Data_siswa;
use Hash;

class AktivasiController extends Controller
{
    public function index()
    {
        return view('auth.aktivasi');
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
            'password' => $request->password,
            'repassword' => $request->repassword            
        ];
        $data = Data_siswa::where('nisn', $login)->get('id');

        //mengecek apakah NISN sudah diinputkan admin
        if(sizeof($data) > 0) {
            //memecah array
            foreach ($data as $as)
            //mengambil data dari array 
            $data_id = ($as->id);
        } else {
            return redirect()->route('aktivasi')->with(['error' => 'NISN Belum Terinput Oleh Admin']);
        }

        //merubahnya menjadi string
        $data_siswa_id = (string)$data_id; 
        $data_cek = User::where('data_siswa_id', $data_siswa_id)->count();

        //proses membuat akun dan validasi duplicate data
        if($data_cek > 0) {
            return redirect()->route('aktivasi')->with(['error' => 'NISN Sudah Terdaftar!']);
        } else {
            try {
                User::create([
                    'nisn' => $request->nisn,
                    'password' => Hash::make($request->password),
                    'data_siswa_id' => $data_siswa_id,
                    'job' => 'Siswa'
                ]);
                return redirect()->route('login')->with(['success' => 'Selamat NISN Berhasil Didaftarkan']);
            } catch(\Exception $e) {
                return redirect()->route('aktivasi')->with(['error' => $e->getMessage()]);
            }
        }
    } else {
        return redirect()->route('aktivasi')->with(['error' => 'Email/Password salah!']);
    }

    }
}
