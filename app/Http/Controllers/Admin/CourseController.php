<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Course;
use App\Http\Controllers\Controller;
use App\Repositories\CourseRepository;
use App\Repositories\DivisionRepository;
use App\Repositories\LevelRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseRepository;
    protected $levelRepository;
    protected $divisionRepository;
    protected $userRepository;

    public function __construct(CourseRepository $courseRepository,
                                LevelRepository $levelRepository,
                                DivisionRepository $divisionRepository,
                                UserRepository $userRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->levelRepository = $levelRepository;
        $this->divisionRepository = $divisionRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $courses = $this->courseRepository->getAll();
        return view('admin.course.list', compact('courses'));
    }

    public function create()
    {
        $course = $this->courseRepository->getModel();
        $levels = $this->levelRepository->getAll();
        $divisions = $this->divisionRepository->getAll();
        $students = $this->userRepository->getStudentsWithOutRegister(getDateNow()->year);
        return view('admin.course.create', compact('course', 'levels', 'divisions', 'students'));
    }

    public function edit($id)
    {
        $course = $this->courseRepository->findOrFail($id);
        $levels = $this->levelRepository->getAll();
        $divisions = $this->divisionRepository->getAll();
        $students = $this->userRepository->getStudentsWithOutRegister($course->year);
        return view('admin.course.edit', compact('course', 'levels', 'divisions', 'students'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'year' => 'required|date_format:Y',
            'level_id' => 'required',
            'division_id' => 'required',
        ]);
        
        /** @var Course $course */
        $course = $this->courseRepository->create($request->all());

        $this->courseRepository->registerStudents($course, $request->all());

        if ($course->save()){
            $response['message'] = trans('admin.course.create.message.success', ['name' => $request->get("level") . " " . $request->get("division")]);
            $response['error'] = false;
        }
        else{
            $response['message'] = trans('admin.course.create.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'year' => 'required|date_format:Y',
            'level_id' => 'required',
            'division_id' => 'required',
        ]);

        /** @var Course $course */
        $course = $this->courseRepository->update($id, $request->all());

        $this->courseRepository->registerStudents($course, $request->all());
        
        if ($course->save()){
            $response['message'] = trans('admin.course.edit.message.success', ['name' => $request->get('level') . " " .$request->get('division')]);
            $response['error'] = false;
        }
        else{
            $response['message'] = trans('admin.course.edit.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }

    public function delete(Request $request)
    {
        $id = json_decode($request->get('data'));

        $response = $this->courseRepository->delete($id);
        
        if($response["has_relation"]) {
            $response['message'] = trans('admin.course.delete.message.has_relation');
            $response['error'] = true;
        } else if($response["deleted"]) {
            $response['message'] = trans('admin.course.delete.message.success', ['name' => $response["name"]]);
            $response['error'] = false;
        } else {
            $response['message'] = trans('admin.course.delete.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }
}