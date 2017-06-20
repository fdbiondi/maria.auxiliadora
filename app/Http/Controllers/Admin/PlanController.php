<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\LevelRepository;
use App\Repositories\PlanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    protected $planRepository;
    protected $levelRepository;

    public function __construct(PlanRepository $planRepository,
                                LevelRepository $levelRepository)
    {
        $this->planRepository = $planRepository;
        $this->levelRepository = $levelRepository;
    }

    public function index()
    {
        $plans = $this->planRepository->getAll();
        return view('admin.plan.list', compact('plans'));
    }

    public function create()
    {
        $plan = $this->planRepository->getModel();
        $levels = $this->levelRepository->getAll();
        return view('admin.plan.create', compact('plan', 'levels'));
    }

    public function edit($id)
    {
        $plan = $this->planRepository->findOrFail($id);
        $levels = $this->levelRepository->getAll();
        return view('admin.plan.edit', compact('plan', 'levels'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required|date_format:d/m/Y',
            'code' => 'required',
            'level_id' => 'required|integer'
        ]);

        $plan = $this->planRepository->create($request->all());

        if ($plan->save()) {
            $response['message'] = trans('admin.plan.create.message.success', ['name' => $request->get("name")]);
            $response['error'] = false;
        } else {
            $response['message'] = trans('admin.plan.create.message.error');
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
            'date' => 'required|date_format:d/m/Y',
            'code' => 'required',
            'level_id' => 'required|integer'
        ]);

        $plan = $this->planRepository->update($id, $request->all());

        if ($plan->save()) {
            $response['message'] = trans('admin.plan.edit.message.success', ['name' => $request->get("name")]);
            $response['error'] = false;
        } else {
            $response['message'] = trans('admin.plan.edit.message.error');
            $response['error'] = true;
        }

        if ($request->ajax()) {
            return response()->json($response);
        }
    }

    public function delete(Request $request)
    {

    }
}