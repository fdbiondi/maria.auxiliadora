<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CourseRepository;
use Illuminate\Http\Request;

class CourseRegistrationController extends Controller
{
	private $courseRepository;


	public function __construct(CourseRepository $courseRepository)
	{
		$this->courseRepository = $courseRepository;
	}

    public function index() 
    {
    	$courses = $this->courseRepository->getCurrentCourses();

    	$course = $this->courseRepository->getModel();

    	return view('admin.course.registration.index', compact('courses', 'course'));
    }

}
