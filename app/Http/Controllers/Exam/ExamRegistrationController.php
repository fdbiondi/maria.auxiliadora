<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Repositories\CourseUserSubjectRepository;
use App\Repositories\ExamRegistrationRepository;
use Illuminate\Http\Request;

class ExamRegistrationController extends Controller
{
    protected $examRegistrationRepository;
    protected $courseUserSubjectRepository;

    public function __construct(ExamRegistrationRepository $examRegistrationRepository,
                                CourseUserSubjectRepository $courseUserSubjectRepository)
    {
        $this->examRegistrationRepository = $examRegistrationRepository;
        $this->courseUserSubjectRepository = $courseUserSubjectRepository;
    }

    public function subjects()
    {
        //$examInstances = $this->examRegistrationRepository->getAll();
        $user = currentUser();
        $subjects = $this->courseUserSubjectRepository->getAllForStudent($user->id);
        return view('exam.registration.subjects', compact('subjects'));
    }
}
