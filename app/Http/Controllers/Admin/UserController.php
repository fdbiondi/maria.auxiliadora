<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\CityRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userRepository;
    protected $roleRepository;
    protected $cityRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository, CityRepository $cityRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->cityRepository = $cityRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('admin.user.list', compact('users'));
    }

    public function create()
    {
        $user = $this->userRepository->getModel();
        $roles = $this->roleRepository->getAll();
        $cities = $this->cityRepository->getAll();
        return view('admin.user.create', compact('user', 'roles', 'cities'));
    }

    public function edit($id)
    {
        $user = $this->userRepository->findOrFail($id);
        $roles = $this->roleRepository->getAll();
        $cities = $this->cityRepository->getAll();
        return view('admin.user.edit', compact('user', 'roles', 'cities'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6|confirmed',
            'dni' => 'required',
            'role_id' => 'required',
            'city_id' => 'required',
        ]);
        
        $user = $this->userRepository->create($request->all());

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
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'min:6|confirmed',
            'dni' => 'required',
            'role_id' => 'required',
            'city_id' => 'required',
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
        } else{
            $response['message'] = trans('admin.user.delete.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }
}
