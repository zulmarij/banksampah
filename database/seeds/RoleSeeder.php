<?php

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'nasabah'
        ]);

        Role::create([
            'name' => 'pengurus1'
        ]);

        Role::create([
            'name' => 'pengurus2'
        ]);

        Role::create([
            'name' => 'bendahara'
        ]);

        Role::create([
            'name' => 'admin'
        ]);
    }
}
