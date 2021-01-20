<?php

use App\Models\Trash;
use Illuminate\Database\Seeder;

class TrashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trash::create([
            'trash' => 'Kertas',
            'price'        => '500',
            'image'        => asset('/img/paper.png')
        ]);

        Trash::create([
            'trash' => 'Plastik',
            'price'        => '1000',
            'image'        => asset('/img/plastic.png')
        ]);

        Trash::create([
            'trash' => 'Kaca',
            'price'        => '1500',
            'image'        => asset('/img/glass.png')
        ]);

        Trash::create([
            'trash' => 'Minyak',
            'price'        => '2000',
            'image'        => asset('/img/oil.png')
        ]);

        Trash::create([
            'trash' => 'Logam',
            'price'        => '2500',
            'image'        => asset('/img/beam.png')
        ]);

        Trash::create([
            'trash' => 'Elektronik',
            'price'        => '3000',
            'image'        => asset('/img/flash.png')
        ]);
    }
}
