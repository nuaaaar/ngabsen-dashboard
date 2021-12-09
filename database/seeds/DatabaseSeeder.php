<?php

use App\User;
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
        User::create([
            'nama' => 'Admin NGABSEN',
            'alamat' => 'Jl. Indonesia Raya',
            'nik' => '647105123123123',
            'username' => 'admin',
            'password' => bcrypt('adm1n_')
        ]);

        // $this->call(UserSeeder::class);
    }
}
