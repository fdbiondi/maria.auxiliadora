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
        $courseUser = $this->findOrFail($id);

        $courseUser->fill($data);

        return $courseUser->save();
    }

    public function delete($id)
    {
        return true;
    }
    
    public function registerStudents($data, $course_id) {
        if(isset($data['users'])) {
            DB::beginTransaction();

            foreach ((array)$data['users'] as $user_id) {
                $this->create([
                    'course_id' => $course_id,
                    'user_id' =>$user_id
                ]);
            }

            return DB::commit();
        }

        return false;
    }
}