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
            'name'=>'Tecnicatura',
            'slug'=>Str::slug('Tecnicatura')
        ]);
        Type::create([
            'category_id'=>1,
            'name'=>'Licenciatura',
            'slug'=>Str::slug('Licenciatura')
        ]);
        Type::create([
            'category_id'=>1,
            'name'=>'Profesorado',
            'slug'=>Str::slug('Profesorado')
        ]);
        Type::create([
            'category_id'=>1,
            'name'=>'Grado',
            'slug'=>Str::slug('Grado')
        ]);
        Type::create([
            'category_id'=>2,
            'name'=>'Especialización',
            'slug'=>Str::slug('Especialización')
        ]);
        Type::create([
            'category_id'=>2,
            'name'=>'Maestría',
            'slug'=>Str::slug('Maestría')
        ]);
        Type::create([
            'category_id'=>2,
            'name'=>'Doctorado',
            'slug'=>Str::slug('Licenciatura')
        ]);
        Type::create([
            'category_id'=>2,
            'name'=>'Diplomatura',
            'slug'=>Str::slug('Diplomatura')
        ]);
        Type::create([
            'category_id'=>3,
            'name'=>'Actualización',
            'slug'=>Str::slug('Actualización')
        ]);
        Type::create([
            'category_id'=>3,
            'name'=>'Taller',
            'slug'=>Str::slug('Taller')
        ]);

    }
}
