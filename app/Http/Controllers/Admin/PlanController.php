<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\PlanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    protected $planRepository;

    public function __construct(PlanRepository $planRepository)
    {
        $this->planRepository = $planRepository;
    }

    public function index()
    {
        $plans = $this->planRepository->getAll();
        return view('admin.plan.list', compact('plans'));
    }

    public function create()
    {
        $plan = $this->planRepository->getModel();
        return view('admin.plan.create', compact('plan'));
    }

    public function edit($id)
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required|date_format:d/m/Y'
        ]);

        $plan = $this->planRepository->create($request->all());

        if ($plan->save()){
            $response['message'] = trans('admin.plan.create.message.success', ['name' => $request->get("name")]);
            $response['error'] = false;
        }
        else{
            $response['message'] = trans('admin.plan.create.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }

    public function update(Request $request, $id)
    {

    }

    public function delete(Request $request)
    {

    }
}