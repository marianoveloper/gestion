<?php

namespace Database\Seeders;

use App\Models\Subcategoria;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Subcategoria::create([
            'category_id'=>1,
            'name'=>'Apertura',
            'slug'=>Str::slug('Apertura')
        ]);



    }
}
