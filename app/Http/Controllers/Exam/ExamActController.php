<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Repositories\ExamActRepository;
use App\Repositories\ExamInstanceRepository;
use App\Repositories\SubjectRepository;
use Illuminate\Http\Request;

class ExamActController extends Controller
{
    protected $examActRepository;
    protected $subjectRepository;
    protected $examInstanceRepository;

    public function __construct(ExamActRepository $examActRepository,
                                SubjectRepository $subjectRepository,
                                ExamInstanceRepository $examInstanceRepository)
    {
        $this->examActRepository = $examActRepository;
        $this->subjectRepository = $subjectRepository;
        $this->examInstanceRepository = $examInstanceRepository;
    }

    public function index()
    {
        $examActs = $this->examActRepository->getAll();
        return view('exam.act.list', compact('examActs'));
    }

    public function create()
    {
        $examAct = $this->examActRepository->getModel();
        $subjects = $this->subjectRepository->getAll();
        $examInstances = $this->examInstanceRepository->getAll();
        return view('exam.act.create', compact('examAct', 'subjects' , 'examInstances'));
    }

    public function edit($id)
    {
        $examAct = $this->examActRepository->findOrFail($id);
        $subjects = $this->subjectRepository->getAll();
        $examInstances = $this->examInstanceRepository->getAll();
        return view('exam.act.edit', compact('examAct', 'subjects' , 'examInstances'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'act_number' => 'required|max:20',
            'classroom' => 'required|max:50',
            'date_time' => 'required|date_format:d/m/Y H:i', 
            'exam_instance_id' => 'required',
            'subject_id' => 'required',
        ]);

        $examAct = $this->examActRepository->create($request->all());

        if ($examAct->save()){
            $response['message'] = trans('exam.act.create.message.success', ['name' => $request->get("act_number")]);
            $response['error'] = false;
        }
        else{
            $response['message'] = trans('exam.act.create.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'act_number' => 'required|max:20',
            'classroom' => 'required|max:50',
            'date_time' => 'required|date_format:d/m/Y H:i',
            'exam_instance_id' => 'required',
            'subject_id' => 'required',
        ]);

        $examAct = $this->examActRepository->update($id, $request->all());

        if ($examAct){
            $response['message'] = trans('exam.act.edit.message.success', ['name' => $request->get('act_number')]);
            $response['error'] = false;
        }
        else{
            $response['message'] = trans('exam.act.edit.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }

    public function delete(Request $request)
    {
        $id = json_decode($request->get('data'));

        $response = $this->examActRepository->delete($id);

        if($response['delete']){
            $response['message'] = trans('exam.act.delete.message.success', ['name' => $response['act_number']]);
            $response['error'] = false;
        }else{
            $response['message'] = trans('exam.act.delete.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }
}
