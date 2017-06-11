<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\LevelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    protected $levelRepository;

    public function __construct(LevelRepository $levelRepository)
    {
        $this->levelRepository = $levelRepository;
    }

    public function index()
    {
        $levels = $this->levelRepository->getAll();
        return view('admin.level.list', compact('levels'));
    }
}
