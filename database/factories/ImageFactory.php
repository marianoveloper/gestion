<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fileName = $this->faker->numberBetween(1, 25) . '.png';

        return [
            'url' => "images/courses/{$fileName}"
        ];
/*
        return [
            'url' => 'cursos/' . $this->faker->image('public/storage/courses', 640, 480, null, false),
        ];*/
    }
}
