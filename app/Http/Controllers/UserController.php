<?php

namespace App\Http\Controllers;

use App\Helpers\LoanQueryService;
use App\Models\Mtr_services;
use App\Models\Mtr_societytype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Excel;

use App\Models\User;

use App\Models\Godowns;

use App\Exports\LoanExport;
use App\Models\Croploan_entry;
use App\Models\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role == 2  || Auth::user()->role == 1) {
                return $next($request);
            }
            abort(403);
        });
    }
    
    function jrusers(Request $request) {
        $jrusers = DB::table('users')->where('role','3')
            ->leftJoin('mtr_region', 'mtr_region.id', 'users.region_id')
            ->select('users.name','mtr_region.region_name')
            ->get();
        $title = "List of JR";
        return view("superadmin.user",compact("jrusers","title"));
    }
    
    function drusers(Request $request) {
        $drusers = DB::table('users')->where('role','4')
            ->leftJoin('mtr_region', 'mtr_region.id', 'users.region_id')
            ->leftJoin('mtr_circle', 'mtr_circle.id', 'users.circle_id')
            ->select('users.name','mtr_region.region_name','mtr_circle.circle_name')
            ->get();
        $title = "List of DR";
        return view("superadmin.user",compact("drusers","title"));
    }

    function societyusers(Request $request) {
        $societyusers = DB::table('users')->where('role','>=','5')
            ->leftJoin('mtr_region', 'mtr_region.id', 'users.region_id')
            ->leftJoin('mtr_circle', 'mtr_circle.id', 'users.circle_id')
            ->leftJoin('mtr_society', 'mtr_society.id', 'users.society_id')
            ->select('users.name','mtr_region.region_name','mtr_circle.circle_name','mtr_society.society_name')
            ->get();
        $title = "List of Society Users";
        return view("superadmin.user",compact("societyusers","title"));
    }

}
