<?php

use Illuminate\Database\Seeder;

class SubjectsRegistrationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\CourseRegistration::class, 5)->create();
        factory(App\Entities\SubjectRegistration::class, 3)->create();
    }
}
