<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Course;
use App\Models\type;
use App\Models\Category;
use App\Models\Sede;
use App\Models\Payment;
use App\Models\User;


class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $title= $this->faker->sentence();
        $link = 8;
        return [
            'title'=> $title,
            'subtitle'=>  $this->faker->sentence(),
            'description' => $this->faker->paragraph(5),
            'destination' =>  $this->faker->sentence(),

            'date_start' =>$this->faker->date(),
            'date_limit' =>$this->faker->date(),
            'url_info' => $this->faker->url(),
            'status' =>  $this->faker->randomElement([Course::Borrador, Course::Revision, Course::Publicado]),
            'status_course' =>  $this->faker->randomElement([Course::Activo, Course::Proximamente, Course::Finalizado]),

            'link_inscription'=>$this->faker->url(),
            'slug' => Str::slug($title),
            'user_id'=>User::all()->random()->id,

            'type_id'=>Type::all()->random()->id,
            'category_id'=>Category::all()->random()->id,
            'payment_id'=>Payment::all()->random()->id,
            'sede_id'=>Sede::all()->random()->id
        ];
    }
}
