<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Data_siswa;
use App\Data_guru;
use App\Mapel;
use Validator;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::where('job', '!=', 'Admin')->count();
        $siswa = Data_siswa::all()->count();
        $guru = Data_guru::all()->count();
        $mapel = Mapel::all()->count();
        return view('admin.index', compact('mapel','guru', 'user', 'siswa'));
    }
    public function profile() 
    {
        $users = User::first();
        return view('admin.profile', compact('users'));
    }

    public function akun()
    {
        $users = User::get();
        return view('admin.user', compact('users'));
    }

    public function akun_siswa()
    {
        $users = User::where('job', 'siswa')->orderBy('nisn', 'ASC')->paginate(10);
        return view('admin.user_siswa', compact('users'));
    }

    public function delete_siswa($id)
    {
        $user = User::find($id);
        $user->delete();
        alert()->success('Berhasil','Data Berhasil Dihapus!');
        return redirect()->route('akun_siswa');
    }

    public function akun_guru()
    {
        $users = User::where('job', 'guru')->orderBy('nisn', 'ASC')->paginate(10);
        return view('admin.user_guru', compact('users'));
    }

    public function delete_guru($id)
    {
        $user = User::find($id);
        $user->delete();
        alert()->success('Berhasil','Data Berhasil Dihapus!');
        return redirect()->route('akun_guru');
    }
}
