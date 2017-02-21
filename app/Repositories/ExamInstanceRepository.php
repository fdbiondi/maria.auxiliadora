<?php

namespace App\Repositories;

use App\Entities\ExamInstance;

class ExamInstanceRepository extends BaseRepository
{
    protected $table = "exam_instances";
    protected $column = "from";

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new ExamInstance();
    }

    public function create(Array $data)
    {
        return $this->getModel()->create([
            'name' => trim($data["name"]),
            'from' => $data["from"],
            'to' => $data["to"],
        ]);
    }

    public function update($id, $data)
    {
        $examInstance = $this->findOrFail($id);

        $examInstance->fill($data);

        return $examInstance->save();
    }

    public function delete($id)
    {
        return true;
    }
}