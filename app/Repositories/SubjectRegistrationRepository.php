<?php

namespace App\Repositories;

use App\Entities\SubjectRegistration;

class SubjectRegistrationRepository extends BaseRepository
{
    protected $table = 'subjects_registration';
    protected $column = 'subject_id';

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new SubjectRegistration();
    }

    /**
     * @return array
     */
    protected function getRules()
    {
        return [];
    }

    public function getAllForStudent($id) {
        return $this->all()
            ->where('course_registration_id', $id, '=')
            ->orderBy($this->column, $this->order);
//        $this->getBy('course_registration_id', $id, null, '*', true);
    }
}