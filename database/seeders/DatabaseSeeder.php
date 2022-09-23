<?php

namespace Database\Seeders;

use App\Models\kategori;
use App\Models\produk;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name'=>'fajar',
            'email'=>'fajar@gmail.com',
            'password'=>bcrypt('1'),
            'role'=>'admin',
        ]);

        User::create([
            'name'=>'customer',
            'email'=>'customer@gmail.com',
            'password'=>bcrypt('1'),
            'role'=>'customer',
        ]);

        $kategori=kategori::create([
            'name'=>'Makanan'
        ]);
        $kategori=kategori::create([
            'name'=>'Minuman'
        ]);
        $kategori=kategori::create([
            'name'=>'Pakaian'
        ]);
        $kategori=kategori::create([
            'name'=>'Elektronik'
        ]);


        produk::create([
            'name'=>'jam aja',
            'harga'=>'100000',
            'kategori_id'=>4,
            'foto'=>'img/jam.jpg'
        ]);
    }
}
