<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Repositories\ExamInstanceRepository;
use Illuminate\Http\Request;

class ExamInstanceController extends Controller
{
    protected $examInstanceRepository;

    public function __construct(ExamInstanceRepository $examInstanceRepository)
    {
        $this->examInstanceRepository = $examInstanceRepository;
    }

    public function index()
    {
        $examInstances = $this->examInstanceRepository->getAll();
        return view('exam.instance.list', compact('examInstances'));
    }

    public function create()
    {
        $examInstance = $this->examInstanceRepository->getModel();
        return view('exam.instance.create', compact('examInstance'));
    }

    public function edit($id)
    {
        $examInstance = $this->examInstanceRepository->findOrFail($id);
        return view('exam.instance.edit', compact('examInstance'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'from' => 'required|date_format:d/m/Y',
            'to' => 'required|date_format:d/m/Y|after:from',
        ]);

        $examInstance = $this->examInstanceRepository->create($request->all());

        if ($examInstance->save()){
            $response['message'] = trans('admin.exam_instance.create.message.success', ['name' => $request->get("name")]);
            $response['error'] = false;
        }
        else{
            $response['message'] = trans('admin.exam_instance.create.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'from' => 'required|date_format:d/m/Y',
            'to' => 'required|date_format:d/m/Y|after:from',
        ]);

        $examInstance = $this->examInstanceRepository->update($id, $request->all());

        if ($examInstance){
            $response['message'] = trans('admin.exam_instance.edit.message.success', ['name' => $request->get('name')]);
            $response['error'] = false;
        }
        else{
            $response['message'] = trans('admin.exam_instance.edit.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }

    public function delete(Request $request)
    {
        $id = json_decode($request->get('data'));

        $response = $this->examInstanceRepository->delete($id);

        if($response['delete']){
            $response['message'] = trans('admin.exam_instance.delete.message.success', ['name' => $response['subject_name']]);
            $response['error'] = false;
        }else{
            $response['message'] = trans('admin.exam_instance.delete.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }
}
