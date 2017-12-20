<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasModule
{
    /**
     * @var string
     */
    protected $request_module;

    /**
     * @var array
     */
    protected $user_modules;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next/*, $request_module*/)
    {
//        $this->request_module = $request_module;
        $this->request_module = $request->route()->getName();

        $this->user_modules = [];
        //$this->user_modules = currentUser()->role->sub_modules->pluck('name')->all();

        if (!$this->check()) {
            //return $this->response('unauthorized', 401);
        }

        return $next($request);
    }

    private function response($message, $status) {
        return response()->json(['error' => $message], $status);
    }

    private function check() {
        return in_array($this->request_module, $this->user_modules);
    }
}