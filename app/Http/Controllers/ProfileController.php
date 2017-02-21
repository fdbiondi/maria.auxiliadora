<?php

namespace App\Http\Controllers;

use App\Repositories\CityRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $userRepository;
    protected $cityRepository;

    public function __construct(UserRepository $userRepository, CityRepository $cityRepository)
    {
        $this->userRepository = $userRepository;
        $this->cityRepository = $cityRepository;
    }

    public function view()
    {
        $user = currentUser();
        $cities = $this->cityRepository->getAll();
        return view('profile.view', compact('user', 'cities'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'dni' => 'required',
            'city_id' => 'required',
        ]);

        $user = $this->userRepository->update(currentUser()->id, $request->all());

        if ($user){
            $response['message'] = trans('admin.profile.update.message.success');
            $response['error'] = false;
        }
        else{
            $response['message'] = trans('admin.profile.update.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }
    
    
}
