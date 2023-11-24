<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\ConfigSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleAndPermission::class);
        $user = User::create([
            'nama' => 'super-admin',
            'email' => 'superadmin@gmail.com',
            'nim' => '07641201059',
            'tahun_masuk' => '2020',
            'is_active' => true,
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('super-admin');

        $user1 = User::create([
            'nama' => 'pengguna',
            'email' => 'pengguna@gmail.com',
            'nim' => '07641201060',
            'tahun_masuk' => '2021',
            'is_active' => true,
            'password' => bcrypt('password'),
        ]);
        $user1->assignRole('pengguna');
    }
}
