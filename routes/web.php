<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function() {
        return view('admin.index');
    })->middleware('can:isAdmin')->name('admin.index');

    Route::group(['prefix' => 'siswa'], function() {
        Route::get('/', 'SiswaController_Admin@index')->middleware('can:isAdmin')->name('admin.siswa');
        Route::post('/', 'SiswaController_Admin@save')->middleware('can:isAdmin');
        Route::get('/{id}', 'SiswaController_Admin@edit')->middleware('can:isAdmin');
        Route::put('/{id}', 'SiswaController_Admin@update')->middleware('can:isAdmin');
        Route::delete('/{id}', 'SiswaController_Admin@destroy')->middleware('can:isAdmin');
    });
    
    Route::group(['prefix' => 'kelas'], function() {
        Route::get('/', 'KelasController_Admin@index')->middleware('can:isAdmin')->name('admin.kelas');
        Route::post('/', 'KelasController_Admin@save')->middleware('can:isAdmin');
        Route::get('/{id}/edit', 'KelasController_Admin@edit')->middleware('can:isAdmin');
        Route::put('/{id}/edit', 'KelasController_Admin@pilih')->middleware('can:isAdmin');
        Route::put('/{id}', 'KelasController_Admin@destroy')->middleware('can:isAdmin');
        Route::delete('/{id}', 'KelasController_Admin@delete')->middleware('can:isAdmin');
    });

    Route::group(['prefix' => 'guru'], function() {
        Route::get('/', 'GuruController_Admin@index')->middleware('can:isAdmin')->name('admin.guru');
        Route::post('/', 'GuruController_Admin@save')->middleware('can:isAdmin');
        Route::get('/{id}/profile', 'GuruController_Admin@info')->middleware('can:isAdmin');
        Route::get('/{id}/edit', 'GuruController_Admin@edit')->middleware('can:isAdmin');
        Route::put('/{id}/edit', 'GuruController_Admin@update')->middleware('can:isAdmin');
        Route::delete('/{id}', 'GuruController_Admin@destroy')->middleware('can:isAdmin');
    });

    Route::get('/akun', 'AdminController@akun')->middleware('can:isAdmin');
    Route::get('/akun_guru', 'AdminController@akun_guru')->middleware('can:isAdmin');
    Route::delete('/akun_guru/{id}', 'AdminController@delete_guru')->middleware('can:isAdmin');
    Route::get('/akun_siswa', 'AdminController@akun_siswa')->middleware('can:isAdmin');
    Route::get('/profile', 'AdminController@profile')->middleware('can:isAdmin');
});

Route::group(['prefix' => 'guru'], function() {
    Route::get('/', 'GuruController@index')->middleware('can:isGuru')->name('guru.index');
    
    Route::group(['prefix' => 'profile'], function() {
        Route::get('/', 'GuruController@profile')->middleware('can:isGuru');
        Route::get('/{id}/edit', 'GuruController@edit')->middleware('can:isGuru');
        Route::put('/{id}', 'GuruController@update')->middleware('can:isGuru');
        Route::get('/{id}/edit_password', 'GuruController@edit_pass')->middleware('can:isGuru')->name('password.change.guru');
        Route::put('/{id}/edit_password', 'GuruController@update_pass')->middleware('can:isGuru');
    });

    Route::group(['prefix' => 'siswa'], function() {
        Route::get('/', 'SiswaController_Guru@index')->middleware('can:isGuru')->name('guru.siswa');
        Route::post('/', 'SiswaController_Guru@save')->middleware('can:isGuru');
        Route::get('/{id}/edit', 'SiswaController_Guru@edit')->middleware('can:isGuru');
        Route::put('/{id}', 'SiswaController_Guru@update')->middleware('can:isGuru');
        Route::delete('/{id}', 'SiswaController_Guru@destroy')->middleware('can:isGuru');
        Route::get('/{id}/profile', 'SiswaController_Guru@info')->middleware('can:isGuru');
    });

    Route::group(['prefix' => 'kelas'], function() {
        Route::get('/', 'KelasController_Guru@index')->middleware('can:isGuru')->name('guru.kelas');
        Route::post('/', 'KelasController_Guru@save')->middleware('can:isGuru');
        Route::delete('/{id}', 'KelasController_Guru@destroy')->middleware('can:isGuru');
    });

    Route::group(['prefix' => 'mapel'], function() {
        Route::get('/', 'MapelController_Guru@index')->middleware('can:isGuru')->name('guru.mapel');
        Route::post('/', 'MapelController_Guru@save')->middleware('can:isGuru');
        Route::get('/{id}', 'MapelController_Guru@edit')->middleware('can:isGuru');
        Route::put('/{id}', 'MapelController_Guru@update')->middleware('can:isGuru');
        Route::delete('/{id}', 'MapelController_Guru@destroy')->middleware('can:isGuru');
    });

    Route::group(['prefix' => 'jadwal'], function() {
        Route::get('/', 'JadwalController_Guru@index')->middleware('can:isGuru')->name('guru.jadwal');
        Route::get('/{kelas_id}', 'JadwalController_Guru@kelas')->middleware('can:isGuru');
        Route::get('/{kelas_id}', 'JadwalController_Guru@cetak_pdf')->middleware('can:isGuru');
        Route::post('/{kelas_id}', 'JadwalController_Guru@save_jadwal')->middleware('can:isGuru');
        Route::get('/{kelas_id}/edit/{id}', 'JadwalController_Guru@edit')->middleware('can:isGuru');
        Route::put('/{kelas_id}/edit/{id}', 'JadwalController_Guru@update')->middleware('can:isGuru');
        Route::delete('/{kelas_id}/{id}', 'JadwalController_Guru@destroy')->middleware('can:isGuru');
    });

    Route::group(['prefix' => 'nilai'], function() {
        Route::get('/', 'NilaiController_Guru@index')->middleware('can:isGuru')->name('guru.nilai');
        Route::get('/{id}', 'NilaiController_Guru@info')->middleware('can:isGuru');
        Route::get('/{id}', 'NilaiController_Guru@cetak_pdf')->middleware('can:isGuru');
        Route::post('/{id}', 'NilaiController_Guru@save_nilai')->middleware('can:isGuru');
        Route::get('/{user_id}/edit/{id}', 'NilaiController_Guru@edit')->middleware('can:isGuru');
        Route::put('/{user_id}/edit/{id}', 'NilaiController_Guru@update')->middleware('can:isGuru');
        Route::delete('/{user_id}/{id}', 'NilaiController_Guru@destroy')->middleware('can:isGuru');
    });

    Route::group(['prefix' => 'laporan'], function() {
        Route::get('/', 'LaporanController_Guru@index')->middleware('can:isGuru')->name('guru.laporan');
    });
});

Route::group(['prefix' => 'siswa'], function() {
    Route::get('/', 'SiswaController@index')->middleware('can:isSiswa')->name('siswa.index');
    Route::get('/profile', 'SiswaController@profile')->middleware('can:isSiswa');
    Route::get('/profile/{id}/edit', 'SiswaController@edit')->middleware('can:isSiswa');
    Route::put('/profile/{id}', 'SiswaController@update')->middleware('can:isSiswa');
    Route::get('/profile/{id}/edit_password', 'SiswaController@edit_pass')->middleware('can:isSiswa')->name('password.change');
    Route::put('/profile/{id}/edit_password', 'SiswaController@update_pass')->middleware('can:isSiswa');
    Route::get('/guru', 'GuruController_siswa@index')->middleware('can:isSiswa');
    Route::get('/jadwal', 'JadwalController_Siswa@index')->middleware('can:isSiswa');
    Route::get('/jadwal/cetak_pdf', 'JadwalController_Siswa@cetak_pdf')->middleware('can:isSiswa');
    Route::get('/nilai', 'NilaiController_siswa@index')->middleware('can:isSiswa');
    Route::get('/nilal/cetak_pdf', 'NilaiController_siswa@cetak_pdf')->middleware('can:isSiswa');
});

Auth::routes(['reset' => false]);

Route::get('/aktivasi', 'AktivasiController@index')->name('aktivasi');
Route::post('/aktivasi', 'AktivasiController@aktivasi');
Route::get('/aktivasiGuru', 'AktivasiController_Guru@index')->name('aktivasiGuru');
Route::post('/aktivasiGuru', 'AktivasiController_Guru@aktivasi');
Route::get('/home', 'HomeController@index')->name('home');
