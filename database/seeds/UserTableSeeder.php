<?php

use Illuminate\Database\Seeder;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'Anugerah',
        //     'job' => 'Admin',
        //     'gender' => 'Laki-laki',
        //     'status' => 'Aktif',
        //     'email' => 'nuge@gmail.com',
        //     'password' => bcrypt('secret')
        // ]);

        User::create([
            'name' => 'Anugerah',
            'job' => 'Siswa',
            'gender' => 'Laki-laki',
            'status' => 'Aktif',
            'email' => 'siswa@gmail.com',
            'password' => bcrypt('secret')
        ]);
    }
}
