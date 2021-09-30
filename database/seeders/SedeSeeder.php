<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sede;
use App\Models\Academic;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sede::create([

            'name'=> 'San Juan'
        ]);
        
        Sede::create([

            'name'=> 'San Luis'
        ]);

        
        Sede::create([

            'name'=> 'Mendoza'
        ]);

        

    
    }
}
