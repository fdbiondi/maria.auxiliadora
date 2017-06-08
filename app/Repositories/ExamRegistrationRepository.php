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

    public function create(Array $data)
    {
/*        return $this->getModel()->create([
            'name' => trim($data["name"]),
            'from' => $data["from"],
            'to' => $data["to"],
        ]);*/
    }

    public function update($id, $data)
    {
/*        $examInstance = $this->findOrFail($id);

        $examInstance->fill($data);

        return $examInstance->save();*/
    }

    public function delete($id)
    {
//        return true;
    }
}