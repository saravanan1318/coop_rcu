<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Mtr_society;
use App\Models\Mtr_region;
use App\Models\Mtr_circle;
use App\Models\Mtr_role;
use App\Models\Mtr_societytype;

class LoginFormController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    //
    function index()
    {
        return view("login");
    }

    function checklogin(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 1) {
                return redirect()->intended('/md/dashboard')
                    ->withSuccess('Signed in');
            } else if (Auth::user()->role == 2) {
                return redirect()->intended('/superadmin/dashboard')
                    ->withSuccess('Signed in');
            } else if (Auth::user()->role == 3) {
                return redirect()->intended('/jr/dashboard')
                    ->withSuccess('Signed in');
            } else if (Auth::user()->role == 4) {
                return redirect()->intended('/dr/dashboard')
                    ->withSuccess('Signed in');
            } else if (Auth::user()->role > 4) {
                return redirect()->intended('/society/dashboard')
                    ->withSuccess('Signed in');
            }
        }
        return redirect('login')->with('error', 'Login details are not valid');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }

    public function importsocietyusers(Request $request)
    {

        //   dd( $request->region_id);


        if (isset($request->region_id)) {
            ini_set('max_execution_time', 18000); //30 minutes

            // $mtr_society = Mtr_society::limit(400)->get();
            $mtr_society = Mtr_society::where('region_id', '=', $request->region_id)->orderBy('region_id', 'ASC')
                ->orderBy('circle_id', 'ASC')->orderBy('societytype_id', 'ASC')->get();
            $individualsocietycount = 1;
            foreach ($mtr_society as $society) {
                //dd($society->region_id);
                $regioncode = Mtr_region::where('id', $society->region_id)->first();
                $circlecode = Mtr_circle::where('region_id', $society->region_id)->where('id', $society->circle_id)->first();
                $role = Mtr_societytype::where('id', $society->societytype_id)->first();

                if ($individualsocietycount == 1) {
                    $actualregion_id = $society->region_id;
                    $actualcircle_id = $society->circle_id;
                    $actualsocietytype_id = $society->societytype_id;
                    $actualcirclecode = $circlecode;
                } else if ($actualregion_id == $society->region_id && $actualcircle_id == $society->circle_id && $actualcirclecode == $circlecode && $actualsocietytype_id == $society->societytype_id) {
                    // $individualsocietycount++;
                } else {
                    $individualsocietycount = 1;
                    $actualregion_id = $society->region_id;
                    $actualcircle_id = $society->circle_id;
                    $actualsocietytype_id = $society->societytype_id;
                    $actualcirclecode = $circlecode;
                }

                $username = $regioncode['region_code'] . $circlecode['circle_code'] . $role['societycode'] . sprintf("%04d", $individualsocietycount);

                $User = new User;
                $User->username = $username;
                $User->name = $society->society_name;
                $User->password = Hash::make(123456);
                $User->region_id = $society->region_id;
                $User->circle_id = $society->circle_id;
                $User->society_id = $society->id;
                $User->role = $role['role_id'];
                //dd($User);
                $User->save();

                $individualsocietycount++;
            }
        }
    }

    public function importcircleusers(Request $request)
    {

        $mtr_circle = Mtr_circle::all();
        foreach ($mtr_circle as $circle) {

            $User = new User;
            $User->username = $circle->circle_name . $circle->circle_code;
            $User->name = $circle->circle_name;
            $User->password = Hash::make(123456);
            $User->region_id = $circle->region_id;
            $User->circle_id = $circle->id;
            $User->role = 4;
            $User->save();
        }
    }

    public function importregionusers(Request $request)
    {

        $mtr_region = Mtr_region::all();
        foreach ($mtr_region as $region) {

            $User = new User;
            $User->username = $region->region_code;
            $User->name = $region->region_name;
            $User->password = Hash::make(123456);
            $User->region_id = $region->id;
            $User->role = 3;
            $User->save();
        }
    }
}
