<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'  => Hash::make('password'),
            'phone'  => '123456780',
            'address'  => 'Pondok Programmer Kec. Kretek Bantul Yogyakarta',
        ]);
        $user->assignRole('admin');
        
        $user = User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara@gmail.com',
            'password'  => Hash::make('password'),
            'phone'  => '123456780',
            'address'  => 'Pondok Programmer Kec. Kretek Bantul Yogyakarta',
        ]);
        $user->assignRole('bendahara');

        $user = User::create([
            'name' => 'pengurus2',
            'email' => 'pengurus2@gmail.com',
            'password'  => Hash::make('password'),
            'phone'  => '123456780',
            'address'  => 'Pondok Programmer Kec. Kretek Bantul Yogyakarta',
        ]);
        $user->assignRole('pengurus2');

        $user = User::create([
            'name' => 'pengurus1',
            'email' => 'pengurus1@gmail.com',
            'password'  => Hash::make('password'),
            'phone'  => '123456780',
            'address'  => 'Pondok Programmer Kec. Kretek Bantul Yogyakarta',
        ]);
        $user->assignRole('pengurus1');

        $user = User::create([
            'name' => 'nasabah',
            'email' => 'nasabah@gmail.com',
            'password'  => Hash::make('password'),
            'phone'  => '123456780',
        ]);
        $user->assignRole('nasabah');
    }
}
