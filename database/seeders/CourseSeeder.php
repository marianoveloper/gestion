<?php

namespace Database\Seeders;


use App\Models\Course;
use App\Models\Image;
use App\Models\Requirement;
use App\Models\Goal;
use App\Models\Section;
use App\Models\Resolution;
use Illuminate\Database\Seeder;


class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::factory(30)->create();

        foreach ($courses as $course) {
            Image::factory(1)->create([
                'imageable_id' => $course->id,
                'imageable_type' => 'App\Models\Course',
            ]);
        }

        Requirement::factory(4)->create([
            'course_id' => $course->id
        ]);

        Goal::factory(4)->create([
            'course_id' => $course->id
        ]);

        Section::factory(4)->create(['course_id' => $course->id]);

        Resolution::factory(4)->create(['course_id' => $course->id]);
    }
}
