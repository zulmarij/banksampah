<?php

use App\Models\Finance;
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
        Finance::create([
            'information' => 'Dana dari pondok',
            'debit'      => '1000000',
            'credit'     => 0,
            'balance'      => '1000000'
        ]);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TrashSeeder::class);
        $this->call(WarehouseSeeder::class);
    }
}
