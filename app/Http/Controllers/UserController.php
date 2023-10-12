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
            ->select('users.id','users.name','mtr_region.region_name')
            ->get();
        $title = "List of JR Users";
        // return $jrusers;
        return view("superadmin.user",compact("jrusers","title"));
    }
    function jrusersAdd(Request $request) {
        $regions = DB::table('mtr_region')->get();
        $title = "Add JR Users";
        return view("superadmin.jruseredit",compact("regions","title"));
    }
    function jrusersStore(Request $request) {
        $user = new User;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->region_id = $request->region;
        $user->role = '3';
        $user->save();
        return redirect('/superadmin/jrusers')->with('success', 'JR User Added Successfully...');
    }
    function jrusersEdit(Request $request, $id) {
        $jruser = DB::table('users')
            ->leftJoin('mtr_region', 'mtr_region.id', 'users.region_id')
            ->select('users.*','mtr_region.region_name')
            ->where('users.role','3')->where('users.id',$id)
            ->first();

        if(empty($jruser)) {
            return redirect('/superadmin/jrusers')->with('warning', 'User does not exist!');
        }

        $regions = DB::table('mtr_region')->get();

        $title = "Edit JR Users";
        return view("superadmin.jruseredit",compact("jruser","regions","title"));
    }
    function jrusersUpdate(Request $request, $id) {
        $user = User::find($id);
        if(empty($user)) {
            return redirect('/superadmin/jrusers')->with('warning', 'User does not exist!');
        }
        $user->username = $request->username;
        $user->name = $request->name;
        if(isset($request->password)) { $user->password = Hash::make($request->password); }
        $user->region_id = $request->region;
        $user->update();
        return redirect('/superadmin/jrusers')->with('success', 'User Updated Successfully...');
    }

    // Dr Users
    function drusers(Request $request) {
        $drusers = DB::table('users')->where('role','4')
            ->leftJoin('mtr_region', 'mtr_region.id', 'users.region_id')
            ->leftJoin('mtr_circle', 'mtr_circle.id', 'users.circle_id')
            ->select('users.id','users.name','mtr_region.region_name','mtr_circle.circle_name')
            ->get();
        $title = "List of DR Users";
        return view("superadmin.user",compact("drusers","title"));
    }
    function drusersAdd(Request $request) {
        $regions = DB::table('mtr_region')->get();
        $circles = DB::table('mtr_circle')->get();
        $title = "Add DR Users";
        return view("superadmin.druseredit",compact("regions","circles","title"));
    }
    function drusersStore(Request $request) {
        $user = new User;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->region_id = $request->region;
        $user->circle_id = $request->circle;
        $user->role = '4';
        $user->save();
        return redirect('/superadmin/drusers')->with('success', 'DR User Added Successfully...');
    }
    function drusersEdit(Request $request, $id) {
        $druser = DB::table('users')
            ->leftJoin('mtr_region', 'mtr_region.id', 'users.region_id')
            ->leftJoin('mtr_circle', 'mtr_circle.id', 'users.circle_id')
            ->select('users.*','mtr_region.region_name','mtr_circle.circle_name')
            ->where('users.role','4')->where('users.id',$id)
            ->first();

        if(empty($druser)) {
            return redirect('/superadmin/drusers')->with('warning', 'User does not exist!');
        }

        $regions = DB::table('mtr_region')->get();
        $circles = DB::table('mtr_circle')->get();

        $title = "Edit DR Users";
        return view("superadmin.druseredit",compact("druser","regions","circles","title"));
    }
    function drusersUpdate(Request $request, $id) {
        $user = User::find($id);
        if(empty($user)) {
            return redirect('/superadmin/drusers')->with('warning', 'User does not exist!');
        }
        $user->username = $request->username;
        $user->name = $request->name;
        if(isset($request->password)) { $user->password = Hash::make($request->password); }
        $user->region_id = $request->region;
        $user->circle_id = $request->circle;
        $user->update();
        return redirect('/superadmin/drusers')->with('success', 'User Updated Successfully...');
    }

    // Society Users
    function societyusers(Request $request) {
        $societyusers = DB::table('users')->where('role','>=','5')
            ->leftJoin('mtr_region', 'mtr_region.id', 'users.region_id')
            ->leftJoin('mtr_circle', 'mtr_circle.id', 'users.circle_id')
            ->leftJoin('mtr_society', 'mtr_society.id', 'users.society_id')
            ->select('users.id','users.name','mtr_region.region_name','mtr_circle.circle_name','mtr_society.society_name')
            ->get();
        $title = "List of Society Users";
        return view("superadmin.user",compact("societyusers","title"));
    }
    function societyusersAdd(Request $request) {
        $regions = DB::table('mtr_region')->get();
        $circles = DB::table('mtr_circle')->get();
        $societies = DB::table('mtr_society')->get();
        $title = "Add Society Users";
        return view("superadmin.societyuseredit",compact("regions","circles","societies","title"));
    }
    function societyusersStore(Request $request) {
        $user = new User;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->region_id = $request->region;
        $user->circle_id = $request->circle;
        $user->society_id = $request->society;
        $user->role = '5';
        $user->save();
        return redirect('/superadmin/societyusers')->with('success', 'Society User Added Successfully...');
    }
    function societyusersEdit(Request $request, $id) {
        $societyuser = DB::table('users')
            ->leftJoin('mtr_region', 'mtr_region.id', 'users.region_id')
            ->leftJoin('mtr_circle', 'mtr_circle.id', 'users.circle_id')
            ->leftJoin('mtr_society', 'mtr_society.id', 'users.society_id')
            ->select('users.*','mtr_region.region_name','mtr_circle.circle_name','mtr_society.society_name')
            ->where('users.role','5')->where('users.id',$id)
            ->first();

        if(empty($societyuser)) {
            return redirect('/superadmin/societyusers')->with('warning', 'User does not exist!');
        }

        $regions = DB::table('mtr_region')->get();
        $circles = DB::table('mtr_circle')->get();
        $societies = DB::table('mtr_society')->get();

        $title = "Add Society Users";
        return view("superadmin.societyuseredit",compact("societyuser","regions","circles","societies","title"));
    }
    function societyusersUpdate(Request $request, $id) {
        $user = User::find($id);
        if(empty($user)) {
            return redirect('/superadmin/societyusers')->with('warning', 'User does not exist!');
        }
        $user->username = $request->username;
        $user->name = $request->name;
        if(isset($request->password)) { $user->password = Hash::make($request->password); }
        $user->region_id = $request->region;
        $user->circle_id = $request->circle;
        $user->society_id = $request->society;
        // return $user;
        $user->update();
        return redirect('/superadmin/societyusers')->with('success', 'Society User Updated Successfully...');
    }

}
