<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Data_siswa;
use App\Kelas;
use Auth;
use Hash;
use Validator;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.index');
    }

    public function profile(Request $request) 
    {
        $session = $request->session()->get('nisn');
        $siswa = User::where('nisn', $session)->get();
        return view('siswa.profile')->with('siswa', $siswa);
    }

    public function edit($id)
    {
        $siswa = Data_siswa::find($id);
        $kelass = Kelas::all();
        return view('siswa.profile_edit', compact('siswa', 'kelass'));
    }

    public function update(Request $request, $id) 
    {
        // dd($request->all());
        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'kelas_id' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
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

            alert()->success('Berhasil','Data Berhasil DiUpdate!');
            return redirect('siswa/profile');
        } catch(\Exception $e) {
            return redirect('siswa/profile')->with(['error' => $e->getMessage()]);
        }
    }

    public function edit_pass($id)
    {
        $siswa = Data_siswa::find($id);
        $kelass = Kelas::all();

        // Untuk Mengecek Password
        // $pas = auth()->user()->password;
        // $decrypt = Hash::check('secret', $pas);
        // dd($decrypt);
        
        return view('siswa.profile_edit_pass', compact('siswa', 'kelass'));
    }

    public function update_pass($id)
    {
        Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, \Auth::user()->password);
        });
 
        // message for custom validation
        $messages = [
            'password' => 'Invalid current password.',
        ];
 
        // validate form
        $validator = Validator::make(request()->all(), [
            'current_password'      => 'required|password',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
 
        ], $messages);
 
        // if validation fails
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }
 
        // update password
        $user = User::find(Auth::id());
 
        $user->password = bcrypt(request('password'));
        $user->save();

        alert()->success('Berhasil','Password Berhasil Diganti!');
        return redirect()
            ->route('password.change', $id);
    }
}
