<?php

namespace App\Repositories;

use App\Entities\CourseUser;
use Illuminate\Support\Facades\DB;

class CourseUserRepository extends BaseRepository
{
    protected $table = "course_user";
    protected $column = "year";

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new CourseUser();
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
}