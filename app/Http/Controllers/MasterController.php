<?php

namespace App\Http\Controllers;

use App\Helpers\LoanQueryService;
use App\Models\Mtr_services;
use App\Models\Mtr_societytype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Excel;

use App\Models\Mtr_region;
use App\Models\Mtr_circle;
use App\Models\Mtr_society;
use App\Models\Mtr_role;
use App\Models\User;

use App\Models\Godowns;

use App\Exports\LoanExport;
use App\Models\Croploan_entry;
use App\Models\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class MasterController extends Controller
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
    
    function region(Request $request) {
        $regions = DB::table('mtr_region')->get();
        $title = "List of Regions";
        return view("superadmin.master",compact("regions","title"));
    }
    
    function circle(Request $request) {
        $circles = DB::table('mtr_circle')
            ->leftJoin('mtr_region', 'mtr_region.id', 'mtr_circle.region_id')
            ->select('mtr_circle.*','mtr_region.region_name')
            ->get();
        $title = "List of Circles";
        return view("superadmin.master",compact("circles","title"));
    }

    function society(Request $request) {
        $societies = DB::table('mtr_society')
            ->leftJoin('mtr_region', 'mtr_region.id', 'mtr_society.region_id')
            ->leftJoin('mtr_circle', 'mtr_circle.id', 'mtr_society.circle_id')
            ->leftJoin('mtr_societytype', 'mtr_societytype.id', 'mtr_society.societytype_id')
            ->select('mtr_region.region_name','mtr_circle.circle_name','mtr_societytype.societytype','mtr_society.society_name')
            ->get();
        $title = "List of Societies";
        // return $societies;
        return view("superadmin.master",compact("societies","title"));
    }

}
