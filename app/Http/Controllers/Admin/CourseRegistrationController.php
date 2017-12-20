<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CourseRegistrationRepository;
use App\Repositories\CourseRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class CourseRegistrationController extends Controller
{
	protected $courseRepository;
	protected $userRepository;
	protected $courseRegistrationRepository;

	public function __construct(CourseRepository $courseRepository,
                                UserRepository $userRepository,
                                CourseRegistrationRepository $courseRegistrationRepository)
	{
		$this->courseRepository = $courseRepository;
		$this->userRepository = $userRepository;
		$this->courseRegistrationRepository = $courseRegistrationRepository;
	}

    public function index() 
    {
    	$courses = $this->courseRepository->getCurrentCourses();
    	$course = $this->courseRepository->getModel();
    	return view('admin.course.registration.list', compact('courses', 'course'));
    }


	public function students($id) {
		$course = $this->courseRepository->show($id); //TODO fix
		$students = $this->userRepository->getStudentsWithOutRegister($course->year);
		return view('admin.course.registration.add', compact('course', 'students'));
	}

	public function store(Request $request, $id) {
	    /** @var \App\Entities\Course $course */
		$course = $this->courseRepository->findOrFail($id);

		$this->courseRepository->registerStudents($course, $request->all());

		if ($course->save()) {
			$response['message'] = trans('admin.course.edit.message.success', ['name' => "{$course->level->name}° {$course->division->name}"]);
			$response['error'] = false;
		} else {
			$response['message'] = trans('admin.course.edit.message.error');
			$response['error'] = true;
		}

		if ($request->ajax()) {
			return response()->json($response);
		}
	}

}
