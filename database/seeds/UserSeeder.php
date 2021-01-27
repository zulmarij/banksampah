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
            'phone'  => '1234567890',
            'address'  => 'Pondok Programmer Kec. Kretek Bantul Yogyakarta',
            'photo' => 'https://i.ibb.co/cFZfrYC/administrator.png'
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara@gmail.com',
            'password'  => Hash::make('password'),
            'phone'  => '1234567890',
            'address'  => 'Pondok Programmer Kec. Kretek Bantul Yogyakarta',
            'photo' => 'https://i.ibb.co/C0mghNC/administrator-woman.png'
        ]);
        $user->assignRole('bendahara');

        $user = User::create([
            'name' => 'pengurus2',
            'email' => 'pengurus2@gmail.com',
            'password'  => Hash::make('password'),
            'phone'  => '1234567890',
            'address'  => 'Pondok Programmer Kec. Kretek Bantul Yogyakarta',
            'photo' => 'https://i.ibb.co/MVYmspy/user2.png'
        ]);
        $user->assignRole('pengurus2');

        $user = User::create([
            'name' => 'pengurus1',
            'email' => 'pengurus1@gmail.com',
            'password'  => Hash::make('password'),
            'phone'  => '1234567890',
            'address'  => 'Pondok Programmer Kec. Kretek Bantul Yogyakarta',
            'photo' => 'https://i.ibb.co/jG8ccy3/worker.png'
        ]);
        $user->assignRole('pengurus1');

        $user = User::create([
            'name' => 'nasabah',
            'email' => 'nasabah@gmail.com',
            'password'  => Hash::make('password'),
            'phone'  => '1234567890',
            'address'  => 'Pondok Programmer Kec. Kretek Bantul Yogyakarta',
            'photo' => 'https://i.ibb.co/gJK2q7G/user-boy4.png'
        ]);
        $user->assignRole('nasabah');
    }
}
