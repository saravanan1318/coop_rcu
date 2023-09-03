<?php

namespace App\Http\Controllers;

use App\Models\Deposit_outstandings;
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

    function dashboard()
    {
        return view("dashboard");
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

}