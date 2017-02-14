<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\SubjectRepository;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    protected $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function index()
    {
        $subjects = $this->subjectRepository->getAll();
        return view('admin.subject.list', compact('subjects'));
    }

    public function create()
    {
        $subject = $this->subjectRepository->getModel();
        return view('admin.subject.create', compact('subject'));
    }

    public function edit($id)
    {
        $subject = $this->subjectRepository->findOrFail($id);
        return view('admin.subject.edit', compact('subject'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'description' => 'max:255'
        ]);

        $subject = $this->subjectRepository->create(
            $request->get("name"),
            $request->get("description")
        );

        if ($subject->save()){
            $response['message'] = trans('admin.subject.create.message.success', ['name' => $request->get("name")]);
            $response['error'] = false;
        }
        else{
            $response['message'] = trans('admin.subject.create.message.error');
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
            'description' => 'max:255'
        ]);

        $subject = $this->subjectRepository->update($id, $request->all());

        if ($subject){
            $response['message'] = trans('admin.subject.edit.message.success', ['name' => $request->get('name')]);
            $response['error'] = false;
        }
        else{
            $response['message'] = trans('admin.subject.edit.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }

    public function delete(Request $request)
    {
        $id = json_decode($request->get('data'));

        $response = $this->subjectRepository->delete($id);

        if($response['delete']){
            $response['message'] = trans('admin.subject.delete.message.success', ['name' => $response['subject_name']]);
            $response['error'] = false;
        }else{
            $response['message'] = trans('admin.subject.delete.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }
}
