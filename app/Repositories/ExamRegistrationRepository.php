<?php

namespace App\Repositories;

use App\Entities\ExamRegistration;

class ExamRegistrationRepository extends BaseRepository
{
    protected $table = "exams_registration";
    //protected $column = "";

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new ExamRegistration();
    }

    /**
     * @return array
     */
    protected function getRules()
    {
        return [];
    }

    public function create($data)
    {
        return $this->getModel()->create([
            'exam_act_id' => $data->exam_act_id,
            'user_id' => $data->user_id,
            ]);
    }


}