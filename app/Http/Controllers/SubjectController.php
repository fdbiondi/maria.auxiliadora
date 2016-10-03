<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use App\Http\Requests;

class SubjectController extends Controller
{
    public function create()
    {
        return view('management.subjects.create');
    }

    public function store(Request $request)
    {
        Subject::create($request->except('_token'));

        return redirect()->route('subjects.list');
    }

    public function all()
    {
        $subjects=Subject::all();

        return view('management.subjects.list', compact('subjects'));
    }
}
