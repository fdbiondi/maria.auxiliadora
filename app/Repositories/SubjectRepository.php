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

    /**
     * @return array
     */
    public function getRules()
    {
        return [
            'name' => 'required|max:100',
            'description' => 'max:255'
        ];
    }

    public function create(array $data)
    {
        return $this->getModel()->create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
    }

    public function update($id, array $data)
    {
        $subject = $this->findOrFail($id);

        $subject->fill($data);

        return $subject->save();
    }

    public function delete($id)
    {
        $subject = $this->findOrFail($id);

        //TODO validate relationships
        
        return [
            'delete' => $subject->delete(),
            'subject_name' => $subject->name
        ];
    }
}