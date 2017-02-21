<?php

namespace App\Repositories;

use App\Entities\Subject;

class SubjectRepository extends BaseRepository
{
    protected $table = "subjects";

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new Subject();
    }

    public function create($name, $description)
    {
        return $this->getModel()->create([
            'name' => $name,
            'description' => $description,
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
        $subject = $this->findOrFail($id);
        
        return [
            'delete' => $subject->delete(),
            'subject_name' => $subject->name
        ];
    }
}