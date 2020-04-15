<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_guru;
use App\User;
use App\Kelas;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use Hash;
use Validator;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.index');
    }

    public function profile(Request $request) 
    {
        $session = $request->session()->get('nisn');
        $guru = User::where('nisn', $session)->get();
        return view('guru.profile')->with('guru', $guru);
    }

    public function edit($id)
    {
        $guru = Data_guru::find($id);
        $kelass = Kelas::all();
        return view('guru.profile_edit', compact('guru', 'kelass'));
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
            return redirect('/guru/profile');
        } catch(\Exception $e) {
            alert()->error('Gagal','Data Gagal DiUbah!');
            return redirect('/guru/profile/'. $id . '/edit')->with(['error' => $e->getMessage()]);
        }
    }

    public function edit_pass($id)
    {
        $guru = Data_guru::find($id);
        $kelass = Kelas::all();

        // Untuk Mengecek Password
        // $pas = auth()->user()->password;
        // $decrypt = Hash::check('secret', $pas);
        // dd($decrypt);
        
        return view('guru.profile_edit_pass', compact('guru', 'kelass'));
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
            ->route('password.change.guru', $id);
    }
}
