<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([

            'name'=>'Carreras',
            'slug'=>Str::slug('Carreras'),
        ]);
        Category::create([

            'name'=>'Diplomaturas y Especializaciones',
            'slug'=>Str::slug('Diplomaturas y Especializaciones')
        ]);
        Category::create([

            'name'=>'Cursos de Actualización',
            'slug'=>Str::slug('Cursos de Actualización')
        ]);


    }
}
