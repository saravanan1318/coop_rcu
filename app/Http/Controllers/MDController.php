<?php

namespace App\Http\Controllers;

use App\Models\Deposit_outstandings;
use App\Models\Mtr_region;
use App\Models\Mtr_societytype;
use Validator;

use App\Models\User;

//loan
use App\Models\Loan;
use App\Models\Loan_trans;
use App\Models\Loan_annual;
use App\Models\Loan_overallot;
use App\Models\Mtr_loan;
use App\Models\Loan_onetimeentry;

//deposit
use App\Models\Deposits;
use App\Models\Mtr_deposits;
use App\Models\Deposit_onetimeentry;


use App\Models\Godowns;

//purchase
use App\Models\Mtr_purchase;
use App\Models\Purchases;

//Sales
use App\Models\Mtr_Sale;
use App\Models\Sales;

//services
use App\Models\Services_agris;
use App\Models\Services_cscs;
use App\Models\Services_drys;
use App\Models\Services_lodgings;
use App\Models\Services_pss;
use App\Models\Services_psss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


//Crop Loan
use App\Models\Croploan_target;
use App\Models\Croploan_entry;
use App\Models\Croploan_categorywise;
use App\Models\Croploan_cropwise;
use App\Models\Mtr_services;
use App\Models\Services;


use DB;

class MDController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role == 1) {
                return $next($request);
            }
            abort(403);
        });
    }

    function dashboard()
    {
        return view("dashboard");
    }
    function notlogged(){

        $region=Mtr_region::all();
        $societyType= Mtr_societytype::all();
        $regionswiseoverall = \Illuminate\Support\Facades\DB::table('mtr_region as a')
            ->select([
                'a.region_name as Region_Name',
                'a.id as Region_ID',
                DB::raw('(SELECT COUNT(DISTINCT ls.userid) FROM loggedsessions as ls WHERE ls.regionid = a.id AND DATE(ls.created_at) = CURDATE()) as logged_socities'),
                DB::raw('(SELECT COUNT(*) FROM users WHERE users.region_id = a.id AND users.society_id IS NOT NULL) as total_no_of_society')
            ])
            ->get();
        $title = "Details of societies not logged in the portal";
        return view("rcs.rcsnotlogged" , compact('region','societyType','regionswiseoverall'));
    }
    function loanlist()
    {

        $loans = Loan::select('*')->with('loantype')->paginate(5);
        return view("loan.list", compact('loans'));
    }


    function depositlist()
    {
        $deposits = Deposits::select('*')->with('deposittype')->paginate(5);

         return view("deposit.list", compact('deposits'));
    }

    function purchaselist()
    {
        $purchases = Purchases::select('*')->with('purchasetype')->paginate(5);

        return view("purchase.list", compact('purchases'));
    }

    function saleslist()
    {
        $sales = Sales::select('*')->with('saletype')->paginate(5);

        return view("sales.list", compact('sales'));
    }

    function godownlist()
    {

        $godowns = Godowns::select('*')->paginate(5);
        return view("godown.list", compact('godowns'));
    }

    function serviceslist()
    {

        $services = Services::select('*')->paginate(5);
        return view("services.list", compact('services'));
    }

    function croploanentrycropwiselist(Request $request)
    {

        $croploan_cropwise = Croploan_cropwise::where('croploan_id', $request->route('croploan_id'))->paginate(5);

        return view("croploan.entry.cropwiselist", compact('croploan_cropwise'));
    }

    function croploanlist()
    {

      //  $croploan_entry = Croploan_entry::where('user_id', Auth::user()->id)->paginate(5);

        $croploan_entry = Croploan_entry::select('*')->paginate(5);

        return view("croploan.entry.list", compact('croploan_entry'));
    }


}
