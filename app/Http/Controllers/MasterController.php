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

    // Region
    function region(Request $request) {
        $regions = DB::table('mtr_region')->get();
        $title = "List of Regions";
        return view("superadmin.master",compact("regions","title"));
    }
    function regionAdd(Request $request) {
        $title = "Add Region";
        return view("superadmin.regionedit")->with('title', $title);
    }
    function regionStore(Request $request) {
        $region = new Mtr_region;
        $region->region_name = $request->region;
        $region->region_code = $request->code;
        $region->save();

        return redirect('/superadmin/regionmaster')->with('success', 'Region Added Successfully...');
    }
    function regionEdit(Request $request, $id) {
        $region = Mtr_region::find($id);
        if(empty($region)) {
            return redirect('/superadmin/regionmaster')->with('warning', 'Region does not exist!');
        }
        $title = "Edit Regions";
        return view("superadmin.regionedit",compact("region","title"));

    }
    function regionUpdate(Request $request, $id) {
        $region = Mtr_region::find($id);
        if(empty($region)) {
            return redirect('/superadmin/regionmaster')->with('warning', 'Region does not exist!');
        }
        $region->region_name = $request->region;
        $region->region_code = $request->code;
        $region->update();

        return redirect('/superadmin/regionmaster')->with('success', 'Region Updated Successfully...');
    }

    // Circle
    function circle(Request $request) {
        $circles = DB::table('mtr_circle')
            ->leftJoin('mtr_region', 'mtr_region.id', 'mtr_circle.region_id')
            ->select('mtr_circle.*','mtr_region.region_name')
            ->get();
        $title = "List of Circles";
        return view("superadmin.master",compact("circles","title"));
    }
    function circleAdd(Request $request) {
        $regions = DB::table('mtr_region')->get();
        $title = "Add Circle";
        return view("superadmin.circleedit",compact("regions","title"));
    }
    function circleStore(Request $request) {
        $circle = new Mtr_circle;
        $circle->region_id = $request->region;
        $circle->circle_name = $request->circle;
        $circle->save();
        return redirect('/superadmin/circlemaster')->with('success', 'Circle Added Successfully...');
    }
    function circleEdit(Request $request, $id) {
        $regions = DB::table('mtr_region')->get();
        $circle = DB::table('mtr_circle')
            ->leftJoin('mtr_region', 'mtr_region.id', '=', 'mtr_circle.region_id')
            ->where('mtr_circle.id',$id)->first();
        if(empty($circle)) {
            return redirect('/superadmin/circlemaster')->with('warning', 'Circle does not exist!');
        }
        $title = "Edit Circle";
        return view("superadmin.circleedit",compact("circle","regions","title"));
    }
    function circleUpdate(Request $request, $id) {
        $circle = Mtr_circle::find($id);
        if(empty($circle)) {
            return redirect('/superadmin/circlemaster')->with('warning', 'Circle does not exist!');
        }
        $circle->region_id = $request->region;
        $circle->circle_name = $request->circle;
        $circle->update();
        return redirect('/superadmin/circlemaster')->with('success', 'Circle Updated Successfully...');
    }

    // Society
    function society(Request $request) {
        $societies = DB::table('mtr_society')
            ->leftJoin('mtr_region', 'mtr_region.id', 'mtr_society.region_id')
            ->leftJoin('mtr_circle', 'mtr_circle.id', 'mtr_society.circle_id')
            ->leftJoin('mtr_societytype', 'mtr_societytype.id', 'mtr_society.societytype_id')
            ->select('mtr_society.id','mtr_region.region_name','mtr_circle.circle_name','mtr_societytype.societytype','mtr_society.society_name')
            ->get();
        $title = "List of Societies";
        return view("superadmin.master",compact("societies","title"));
    }
    function societyAdd(Request $request) {
        $regions = DB::table('mtr_region')->get();
        $circles = DB::table('mtr_circle')->get();
        $societytypes = DB::table('mtr_societytype')->get();
        $title = "Add Society";
        return view("superadmin.societyedit",compact("regions","circles","societytypes","title"));
    }
    function societyStore(Request $request) {
        $society = new Mtr_society;
        $society->region_id = $request->region;
        $society->circle_id = $request->circle;
        $society->societytype_id = $request->societytype;
        $society->society_name = $request->society;
        $society->registration_no = $request->regno;
        $society->staff_name = $request->staff_name;
        $society->designation = $request->designation;
        $society->mobile_no = $request->mobile_no;
        $society->address = $request->address;
        $society->pincode = $request->pincode;
        $society->email = $request->email;
        $society->save();
        return redirect('/superadmin/societymaster')->with('success', 'Society Added Successfully...');
    }
    function societyEdit(Request $request, $id) {
        $society = DB::table('mtr_society')
            ->leftJoin('mtr_region', 'mtr_region.id', 'mtr_society.region_id')
            ->leftJoin('mtr_circle', 'mtr_circle.id', 'mtr_society.circle_id')
            ->leftJoin('mtr_societytype', 'mtr_societytype.id', 'mtr_society.societytype_id')
            ->select('mtr_society.*','mtr_region.region_name','mtr_circle.circle_name','mtr_societytype.societytype')
            ->where('mtr_society.id',$id)
            ->first();
        if(empty($society)) {
            return redirect('/superadmin/societymaster')->with('warning', 'Society does not exist!');
        }
        $regions = DB::table('mtr_region')->get();
        $circles = DB::table('mtr_circle')->get();
        $societytypes = DB::table('mtr_societytype')->get();
        $title = "Edit Society";
        return view("superadmin.societyedit",compact("society","regions","circles","societytypes","title"));
    }
    function societyUpdate(Request $request, $id) {
        $society = Mtr_society::find($id);
        if(empty($society)) {
            return redirect('/superadmin/societymaster')->with('warning', 'Society does not exist!');
        }
        $society->region_id = $request->region;
        $society->circle_id = $request->circle;
        $society->societytype_id = $request->societytype;
        $society->society_name = $request->society;
        $society->registration_no = $request->regno;
        $society->staff_name = $request->staff_name;
        $society->designation = $request->designation;
        $society->mobile_no = $request->mobile_no;
        $society->address = $request->address;
        $society->pincode = $request->pincode;
        $society->email = $request->email;
        $society->update();
        // return $society;
        return redirect('/superadmin/societymaster')->with('success', 'Society Updated Successfully...');
    }
}
