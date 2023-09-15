<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role == 14) {
                return $next($request);
            }
            abort(403);
        });
    }
    function dashboard()
    {
        return view("admin.dashboard");
    }
}
