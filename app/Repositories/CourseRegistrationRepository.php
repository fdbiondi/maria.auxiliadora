<?php

namespace App\Repositories;

use App\Entities\Course;
use App\Entities\CourseRegistration;

class CourseRegistrationRepository extends BaseRepository
{
    protected $table = 'courses_registration';
    protected $column = 'year';

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new CourseRegistration();
    }

    /**
     * @return array
     */
    protected function getRules()
    {
        return [];
    }

    public function create(Array $data)
    {
        return $this->getModel()->create([
            'course_id' => $data["course_id"],
            'user_id' => $data["user_id"],
        ]);
    }

    public function update($id, $data)
    {
        return true;
    }

    public function delete($id)
    {
        return true;
    }

    public function registerStudentSubjects($user_id, Course $course) {
        /** @var CourseRegistration $courseRegistration */
        $courseRegistration = $this->getFirst([
            'user_id' => $user_id,
            'course_id' => $course->id
        ]);

        $subjects = $course->level->plans->where('current', 1)->first()->subjects;

        foreach ($subjects as $subject) {
            $courseRegistration->subjects()->attach($subject->id);
        }

        return true;
    }
}