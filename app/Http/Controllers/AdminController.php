<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class AdminController extends Controller
{
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
        $users = User::where('job', 'siswa')->get();
        return view('admin.user_siswa', compact('users'));
    }

    public function delete_siswa($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin.user_siswa');
    }

    public function akun_guru()
    {
        $users = User::where('job', 'guru')->get();
        return view('admin.user_guru', compact('users'));
    }

    public function delete_guru($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin.user_guru');
    }
}
