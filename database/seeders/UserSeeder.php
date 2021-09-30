<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user=  User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'=> bcrypt('Admin_virtual$@')
        ]);
        $user=  User::create([
            'name' => 'Marita',
            'email' => 'jefatura@uccuyo.edu.ar',
            'password'=> bcrypt('Eduvirtual_2021')
        ]);
        $user=  User::create([
            'name' => 'DEV',
            'email' => 'campusvirtual@uccuyo.edu.ar',
            'password'=> bcrypt('Virtual_2021')
        ]);
        $user=  User::create([
            'name' => 'Mariano Admin',
            'email' => 'toto@gmail.com',
            'password'=> bcrypt('t@t@2021')
        ]);
        $user->assignRole('Admin');
    }
}
