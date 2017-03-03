<?php

namespace App\Repositories;

use App\Entities\CourseUserSubject;

class CourseUserSubjectRepository extends BaseRepository
{
    protected $table = "course_user_subject";
    protected $column = "subject_id";

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new CourseUserSubject();
    }

    public function create(Array $data)
    {

    }

    public function update($id, $data)
    {

    }

    public function delete($id)
    {

    }

    public function getAllForStudent($id) {
        return $this->newQuery()
            ->selectRaw('*')
            ->where('course_user_id', $id)
            ->orderBy($this->column, $this->order);
    }
}