<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('admin.user.list', compact('users'));
    }

    public function create()
    {
        $user = $this->userRepository->getModel();
        return view('admin.user.create', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->userRepository->findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

        ]);

        $user = $this->userRepository->create();

        if ($user->save()){
            $response['message'] = trans('admin.user.create.message.success', ['name' => $request->get("name")]);
            $response['error'] = false;
        }
        else{
            $response['message'] = trans('admin.user.create.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

        ]);

        $user = $this->userRepository->update($id, $request->all());

        if ($user){
            $response['message'] = trans('admin.user.edit.message.success', ['name' => $request->get('name')]);
            $response['error'] = false;
        }
        else{
            $response['message'] = trans('admin.user.edit.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }

    public function delete(Request $request)
    {
        $id = json_decode($request->get('data'));

        $response = $this->userRepository->delete($id);

        if($response['delete']){
            $response['message'] = trans('admin.user.delete.message.success', ['name' => $response['user_name']]);
            $response['error'] = false;
        }else{
            $response['message'] = trans('admin.user.delete.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }
}
