<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([

            'name'=>'Licenciatura',

        ]);
        Categoria::create([

            'name'=>'Tecnicatura',

        ]);
        Categoria::create([

            'name'=>'Maestría',

        ]);
        Categoria::create([

            'name'=>'Especialización',

        ]);

        Categoria::create([

            'name'=>'Carrera de Grado',

        ]);


    }
}
