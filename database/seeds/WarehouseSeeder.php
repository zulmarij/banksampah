<?php

use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    public function run()
    {
        Warehouse::create([
            'trash_id' => '1',
            'weight'        => '0'
        ]);

        Warehouse::create([
            'trash_id' => '2',
            'weight'        => '0'
        ]);

        Warehouse::create([
            'trash_id' => '3',
            'weight'        => '0'
        ]);

        Warehouse::create([
            'trash_id' => '4',
            'weight'        => '0'
        ]);

        Warehouse::create([
            'trash_id' => '5',
            'weight'        => '0'
        ]);

        Warehouse::create([
            'trash_id' => '6',
            'weight'        => '0'
        ]);
    }
}
