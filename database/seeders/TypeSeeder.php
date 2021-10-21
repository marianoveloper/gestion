<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Type::create([
            'category_id'=>1,
            'name'=>'Apertura',
            'slug'=>Str::slug('Apertura')
        ]);
        Type::create([
            'category_id'=>1,
            'name'=>'Matriculación',
            'slug'=>Str::slug('Matriculacion')
        ]);

        Type::create([
            'category_id'=>2,
            'name'=>'Apertura',
            'slug'=>Str::slug('Apertura')
        ]);
        Type::create([
            'category_id'=>2,
            'name'=>'Matriculacón',
            'slug'=>Str::slug('Matriculacion')
        ]);


        Type::create([
            'category_id'=>3,
            'name'=>'Académico',
            'slug'=>Str::slug('Tutoriales')
        ]);
        Type::create([
            'category_id'=>3,
            'name'=>'Diseño Instruccional',
            'slug'=>Str::slug('Diseño Instruccional')
        ]);

    }
}
