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
    protected function getRules()
    {
        return [];
    }

    public function getCurrentCourses()
    {
        return $this->getBy('year', getDateNow()->year, '=');
    }

    public function create(Array $data)
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

        try {
            if (($course->users->count() > 0)) {
                return [
                    'deleted' => false,
                    'has_relation' => true,
                ];
            }
            else {
                return [
                    'has_relation' => false,
                    'name' => "{$course->level->name}° {$course->division->name} - {$course->year}",
                    'deleted' => $course->delete(),
                ];
            }
        }
        catch (Exception $e) {
            return [
                'deleted' => false,
                'has_relation' => false,
            ];
        }
    }

    public function registerStudents(Course $course, Array $data) {
        $course->users()->detach();

        if(isset($data['users'])) {
            foreach ((array)$data['users'] as $user_id) {
                $course->users()->attach($user_id);
            }

            return true;
        }

        return false;
    }
}