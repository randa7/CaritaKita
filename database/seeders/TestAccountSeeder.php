<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\Penulis;
use Illuminate\Support\Facades\Hash;

class TestAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $userAdmin = new User();
        $userAdmin->nama = 'Admin';
        $userAdmin->email = 'admin@gmail.com';
        $userAdmin->password = Hash::make('admin');

        $userAdmin->save();
        $userAdmin->admin()->save($admin);

        $penulis = new Penulis();
        $penulis->alamat = 'alamat penulis';
        $penulis->kota = 'kota penulis';
        $penulis->no_telp = '0888888888';
        $userPenulis = new User();
        $userPenulis->nama = 'Penulis';
        $userPenulis->email = 'penulis@gmail.com';
        $userPenulis->password = Hash::make('penulis');

        $userPenulis->save();
        $userPenulis->penulis()->save($penulis);
    }
}
