<?php

namespace App\Repositories;

use App\Entities\Course;

class CourseRepository extends BaseRepository
{
    protected $table = "courses";
    protected $column = "date";

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
            $this->prepareDataToSave($data)
        ]);
    }

    public function update($id, $data)
    {
        $subject = $this->findOrFail($id);

        $subject->fill($data);

        return $subject->save();
    }

    public function delete($id)
    {
        return true;
    }

    public function prepareDataToSave(Array $data) {
        return [
            'date' => $data["date"],
            'level_id' => $data["level_id"],
            'division_id'=> $data["division_id"],
        ];
    }
}