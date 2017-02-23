<?php

namespace App\Repositories;

use App\Entities\Course;

class CourseRepository extends BaseRepository
{
    protected $table = "courses";
    protected $column = "year";

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new Course();
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

        return $course->save();
    }

    public function delete($id)
    {
        $course = $this->findOrFail($id);

        if ((count($course->users) > 0)) {
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
}