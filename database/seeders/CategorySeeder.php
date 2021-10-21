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

            'name'=>'Cursos',
            'slug'=>Str::slug('Cursos ')
        ]);
        Category::create([

            'name'=>'Material Académico',
            'slug'=>Str::slug('Material Academico')
        ]);



    }
}
