<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([

            'name' => 'gratis',
            'value'=> 0
        ]);

        Payment::create([

            'name' => '3000 $ (cursos)',
            'value'=> 3000
        ]);

        Payment::create([

            'name' => '5000 $ (diplomatura)',
            'value'=> 5000
        ]);

        Payment::create([

            'name' => '10000 $ (carreras)',
            'value'=> 10000
        ]);
    }
}
