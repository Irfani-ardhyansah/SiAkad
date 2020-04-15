<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function authenticated(Request $request)
    {
        if ( $request->user()->job == 'Admin' ) {
            return redirect()->route('admin.index');
        } else if ( $request->user()->job == 'Guru' ) {
            return redirect()->route('guru.index');
        } else if( $request->user()->job == 'Siswa' ) {
            return redirect()->route('siswa.index');
        } else {
            return redirect('/login');
        }
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required|string', //VALIDASI KOLOM USERNAME
            'password' => 'required|string',
        ]);

        //LAKUKAN PENGECEKAN, JIKA INPUTAN DARI USERNAME FORMATNYA ADALAH EMAIL, MAKA KITA AKAN MELAKUKAN PROSES AUTHENTICATION MENGGUNAKAN EMAIL, SELAIN ITU, AKAN MENGGUNAKAN USERNAME
        $loginType = filter_var($request->nisn, FILTER_VALIDATE_EMAIL) ? 'email' : 'nisn';
    
        //TAMPUNG INFORMASI LOGINNYA, DIMANA KOLOM TYPE PERTAMA BERSIFAT DINAMIS BERDASARKAN VALUE DARI PENGECEKAN DIATAS
        $login = [
            $loginType => $request->nisn,
            'password' => $request->password
        ];
    
        //LAKUKAN LOGIN
        if (auth()->attempt($login)) {
            //JIKA BERHASIL, MAKA REDIRECT KE HALAMAN HOME
            Session::put('nisn',$login);
            if ( $request->user()->job == 'Admin' ) {
                return redirect()->route('admin.index')->with(['success' => 'Selamat Datang <b>Admin<b>']);
            } else if ( $request->user()->job == 'Guru' ) {
                return redirect()->route('guru.index')->with(['success' => 'Selamat Datang ' . auth()->user()->guru->nama ]);
            } else if( $request->user()->job == 'Siswa' ) {
                return redirect()->route('siswa.index')->with(['success' => 'Selamat Datang ' . auth()->user()->siswa->nama ]);
            } else {
                return redirect('/login');
            }
        }
        //JIKA SALAH, MAKA KEMBALI KE LOGIN DAN TAMPILKAN NOTIFIKASI 
        return redirect()->route('login')->with(['error' => 'NISN/Password salah!']);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->flush();
        return redirect('/login');
    }
}
