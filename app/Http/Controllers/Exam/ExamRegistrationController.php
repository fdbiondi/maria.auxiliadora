<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Repositories\SubjectRegistrationRepository;
use App\Repositories\UserRepository;
use App\Repositories\ExamRegistrationRepository;
use Illuminate\Http\Request;
use App\Entities\ExamAct;
use App\Entities\Subject;

class ExamRegistrationController extends Controller
{
    protected $examRegistrationRepository;
    protected $subjectRegistrationRepository;
    protected $userRepository;

    public function __construct(ExamRegistrationRepository $examRegistrationRepository,
                                SubjectRegistrationRepository $subjectRegistrationRepository,
                                UserRepository $userRepository)
    {
        $this->examRegistrationRepository = $examRegistrationRepository;
        $this->subjectRegistrationRepository = $subjectRegistrationRepository;
        $this->userRepository = $userRepository;
    }

    public function subjects($id = null)
    {
        if ($id == null) { //TODO validar que si es un estudiante le muestre solo sus materias
            $user = currentUser();
        } else {
            $user = $this->userRepository->findOrFail($id);
        }
        
        $subjects = $user->getPendingSubjects();
                            
        return view('exam.registration.subjects', compact('subjects'));
    }

    public function search()
    {
        $students = $this->userRepository->getWhereRole('student');
        return view('exam.registration.search', compact('students'));
    }

    public function index($student_id, Subject $subject) 
    {
        //TODO emprolijar código y validar que no se haya inscripto.
        $exams = ExamAct::with(['instance'])
            ->where([
                ['subject_id', $subject->id],
                ['date_time','>', getDateNow()]
            ])
            ->orderBy('date_time')
            ->get();

        return view('exam.registration.index', compact('exams', 'student_id', 'subject'));
    }

    public function store(Request $request)
    {
        $data = json_decode($request->get('data'));
        $exam_registration = $this->examRegistrationRepository->create($data);

        if ($exam_registration->save()){
            $response['message'] = trans('exam.registration.create.message.success');
            $response['error'] = false;
        }
        else{
            $response['message'] = trans('exam.registration.create.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }
}
