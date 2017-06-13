<?php

use Illuminate\Database\Seeder;

class UserSubjectCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\CourseUser::class, 5)->create();    
        factory(App\Entities\CourseUserSubject::class, 3)->create();    

    }
}
