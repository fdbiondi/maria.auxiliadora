<?php

namespace App\Repositories;

use App\Entities\ExamAct;

class ExamActRepository extends BaseRepository
{
    protected $table = "exam_acts";
    protected $column = "date_time";

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new ExamAct();
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
            'act_number' => $data['act_number'],
            'classroom' => $data['classroom'],
            'date_time' => $data['date_time'],
            'exam_instance_id' => $data['exam_instance_id'],
            'subject_id' => $data['subject_id'],
        ]);
    }

    public function update($id, $data)
    {
        $examAct = $this->findOrFail($id);

        $examAct->fill($data);

        return $examAct->save();
    }

    public function delete($id)
    {
        return true;
    }
}