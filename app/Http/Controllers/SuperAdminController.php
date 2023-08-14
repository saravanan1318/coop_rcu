<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    //

    function dashboard(){
        return view("superadmin.dashboard");
    }

    function loanreport(){
        return view("superadmin.loanreport");
    }

}
