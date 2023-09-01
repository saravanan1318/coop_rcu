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
    function index(){
        return view("login");
    }
    
    function checklogin(Request $request){

        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {

            return redirect()->intended('/society/dashboard')
                ->withSuccess('Signed in');
           
        }
  
        return redirect('login')->with('error', 'Login details are not valid');

    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('login');
    }

    public function importsocietyusers(){

       

        ini_set('max_execution_time', 18000); //30 minutes

        $mtr_society = Mtr_society::all();
        
        foreach($mtr_society as $society){
            //dd($society->region_id);
            $regioncode = Mtr_region::where('id', $society->region_id)->first();
            $circlecode = Mtr_circle::where('region_id', $society->region_id)->where('id', $society->circle_id)->first();
            $role = Mtr_societytype::where('id', $society->societytype_id)->first();
            
            $username = $regioncode['region_code'].$circlecode['circle_code'].$role['societycode'].sprintf("%04d", $society->id);
            
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

        }
       
    }

}
