<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sede;
use App\Models\UnidadAcademic;

class UnidadAcademicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnidadAcademic::create([

            'name'=> 'Facultad de Filosofía y Humanidades'
        ]);

        UnidadAcademic::create([

            'name'=> 'Facultad de Cs. Químicas y Tecnológicas'
        ]);


        UnidadAcademic::create([

            'name'=> 'Facultad de Cs. Económicas y Empresariales'
        ]);

        UnidadAcademic::create([

            'name'=> 'Facultad de Derecho y Cs.Sociales'
        ]);
        UnidadAcademic::create([

            'name'=> 'Facultad de Cs. Médicas'
        ]);

        UnidadAcademic::create([

            'name'=> 'Facultad de Don Bosco'
        ]);

        UnidadAcademic::create([

            'name'=> 'Escuela de Seguridad'
        ]);
    }
}
