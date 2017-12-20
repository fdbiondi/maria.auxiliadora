<?php

namespace App\Repositories;

use App\Entities\Course;
use Mockery\CountValidator\Exception;

class CourseRepository extends BaseRepository
{
    protected $table = "courses";
    protected $column = "year";
    protected $order = "desc";

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new Course();
    }

    /**
     * @return array
     */
    public function getRules()
    {
        return [
            'year' => 'required|date_format:Y',
            'level_id' => 'required',
            'division_id' => 'required',
        ];
    }

    public function getCurrentCourses()
    {
        return $this->getBy('year', getDateNow()->year);
    }

    public function show($id)
    {
        return $this->getFirst('id', $id, [
            'students',
            'level',
            'division',
            'level.plans' => function($query) {
                $query->where('current', 1)->with('subjects');
        }]);
    }

    public function create(array $data)
    {
        return $this->getModel()->create([
            'year' => $data["year"],
            'level_id' => $data["level_id"],
            'division_id'=> $data["division_id"],
        ]);
    }

    public function update($id, $data)
    {
        $course = $this->findOrFail($id);

        $course->fill($data);

        return $course;
    }

    public function delete($id)
    {
        $course = $this->findOrFail($id);

        if (($course->users->count() > 0)) {
            return [
                'deleted' => false,
                'has_relation' => true,
            ];
        } else {
            return [
                'has_relation' => false,
                'name' => "{$course->level->name}° {$course->division->name} - {$course->year}",
                'deleted' => $course->delete(),
            ];
        }
    }

    public function registerStudents(Course $course, array $data) {
        $course->users()->detach();

        if(isset($data['users'])) {
            $courseRegistrationRepository = new CourseRegistrationRepository();

            foreach ((array)$data['users'] as $user_id) {
                $course->users()->attach($user_id);

                $courseRegistrationRepository->registerStudentSubjects($user_id, $course);
            }

            return true;
        }

        return false;
    }
}