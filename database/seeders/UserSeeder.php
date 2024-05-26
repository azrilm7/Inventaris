<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Administrator = User::updateOrCreate([
            'name' => 'Administrator',
            'role' => 'Administrator',
            'username' => 'administrator',
            'jenis_kelamin' => 'Laki-laki',
            'email' => 'administrator@gmail.com',
            'password' => bcrypt('admin1')
        ]);
        $Administrator->assignRole('Administrator');
        
        $Operator = User::updateOrCreate([
            'name' => 'Operator',
            'role' => 'Operator',
            'username' => 'operator',
            'jenis_kelamin' => 'Laki-laki',
            'email' => 'operator@gmail.com',
            'password' => bcrypt('operator1')
        ]);
        $Operator->assignRole('Operator');

        $Petugas = User::updateOrCreate([
            'name' => 'Petugas',
            'role' => 'Petugas',
            'username' => 'petugas',
            'jenis_kelamin' => 'Laki-laki',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('petugas1')
        ]);
        $Petugas->assignRole('Petugas');

        $user1 = User::updateOrCreate([
            'name' => 'Jonathan',
            'role' => 'Administrator',
            'username' => 'Jonathan1',
            'jenis_kelamin' => 'Laki-laki',
            'email' => 'Jonathan@gmail.com',
            'password' => bcrypt('J13')
        ]);
        $user1->assignRole('Administrator');

        $user2 = User::updateOrCreate([
            'name' => 'Siti',
            'role' => 'Administrator',
            'username' => 'Siti1',
            'jenis_kelamin' => 'Perempuan',
            'email' => 'Siti@gmail.com',
            'password' => bcrypt('S13')
        ]);
        $user2->assignRole('Administrator');

        $user3 = User::updateOrCreate([
            'name' => 'Azril',
            'role' => 'Administrator',
            'username' => 'azril1',
            'jenis_kelamin' => 'Laki-laki',
            'email' => 'azrilmalika@gmail.com',
            'password' => bcrypt('12345')
        ]);
        $user3->assignRole('Administrator');

    }
}
