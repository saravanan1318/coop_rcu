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
use App\Models\Jr;
use App\Models\Jr_dai;
use App\Models\Jr_disqualify;
use App\Models\Jr_eightyone;
use App\Models\Jr_eightytwo;
use App\Models\Jr_seventeena;
use App\Models\Jr_surcharge;
use App\Models\Mtr_services;
use App\Models\Services;


use DB;

class JRController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role == 3) {
                return $next($request);
            }
            abort(403);
        });
    }

    function dashboard()
    {
        return view("dashboard");
    }

    function loanlist()
    {

        $loans = Loan::select('*')->with('loantype')
            ->whereIn('user_id', function ($query) {
                $query->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            })
            ->paginate(5);
        return view("loan.list", compact('loans'));
    }


    function depositlist()
    {
        $deposits = Deposits::select('*')->with('deposittype')
            ->whereIn('user_id', function ($query) {
                $query->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            })
            ->paginate(5);

        return view("deposit.list", compact('deposits'));
    }

    function purchaselist()
    {
        $purchases = Purchases::select('*')->with('purchasetype')
            ->whereIn('user_id', function ($query) {
                $query->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            })
            ->paginate(5);

        return view("purchase.list", compact('purchases'));
    }

    function saleslist()
    {
        $sales = Sales::select('*')->with('saletype')
            ->whereIn('user_id', function ($query) {
                $query->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            })
            ->paginate(5);

        return view("sales.list", compact('sales'));
    }

    function godownlist()
    {

        $godowns = Godowns::select('*')
            ->whereIn('user_id', function ($query) {
                $query->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            })
            ->paginate(5);
        return view("godown.list", compact('godowns'));
    }

    function serviceslist()
    {

        $services = Services::select('*')
            ->whereIn('user_id', function ($query) {
                $query->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            })
            ->paginate(5);
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

        $croploan_entry = Croploan_entry::select('*')
            ->whereIn('user_id', function ($query) {
                $query->select('id')->from('users')->where('region_id', Auth::user()->region_id);
            })
            ->paginate(5);

        return view("croploan.entry.list", compact('croploan_entry'));
    }
    function add()
    {

        $jr = Jr::select('*')->paginate(5);
        return view("jr.add", compact('jr'));
    }
    function list()
    {

        $jr = Jr::select('*')->paginate(5);
        return view("jr.list", compact('jr'));
    }

    function eightyoneadd()
    {

        $jr = Jr_eightyone::select('*')->paginate(5);
        return view("jr.eightyone.add", compact('jr'));
    }
    function eightyonelist()
    {

        $jr = Jr_eightyone::select('*')->paginate(5);
        return view("jr.eightyone.list", compact('jr'));
    }


    function eightyonestore(Request $request)
    {
        // Validate the form data
        $request->validate([

            'ob_eighty_one' => 'required|integer',
            'ordered_this_month_eighty_one' => 'required|integer',
            'total_ob_ordered_eighty_one' => 'required|integer',
            'completed_this_month_eighty_one' => 'required|integer',
            'pending_within_3_months_eighty_one' => 'required|integer',
            'pending_in_3_to_6_months_eighty_one' => 'required|integer',
            'pending_above_6_months_eighty_one' => 'required|integer',
            'total_pending_eighty_one' => 'required|integer',
            'pending_percentage_eighty_one' => 'required',
        ]);

        // Create a new instance of the model and populate it with the form data
        $eightyone = new Jr_eightyone();
        $eightyone->region_name = Auth::user()->name;
        $eightyone->eightyonedate = $request->input('eightyonedate');
        $eightyone->ob_eighty_one = $request->input('ob_eighty_one');
        $eightyone->ordered_this_month_eighty_one = $request->input('ordered_this_month_eighty_one');
        $eightyone->total_ob_ordered_eighty_one = $request->input('total_ob_ordered_eighty_one');
        $eightyone->completed_this_month_eighty_one = $request->input('completed_this_month_eighty_one');
        $eightyone->pending_within_3_months_eighty_one = $request->input('pending_within_3_months_eighty_one');
        $eightyone->pending_in_3_to_6_months_eighty_one = $request->input('pending_in_3_to_6_months_eighty_one');
        $eightyone->pending_above_6_months_eighty_one = $request->input('pending_above_6_months_eighty_one');
        $eightyone->total_pending_eighty_one = $request->input('total_pending_eighty_one');
        $eightyone->pending_percentage_eighty_one = $request->input('pending_percentage_eighty_one');

        $eightyone->save();

        return redirect('/jr/eightyone/list')->with('status', '81-Inquiry added successfully');
    }

    function eightytwoadd()
    {

        $jr = Jr_eightytwo::select('*')->paginate(5);
        return view("jr.eightytwo.add", compact('jr'));
    }
    function eightytwolist()
    {

        $jr = Jr_eightytwo::select('*')->paginate(5);
        return view("jr.eightytwo.list", compact('jr'));
    }

    function eightytwostore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'eightytwodate' => 'required',
            'ob_eighty_two' => 'required|integer',
            'ordered_this_month_eighty_two' => 'required|integer',
            'total_ob_ordered_eighty_two' => 'required|integer',
            'completed_this_month_eighty_two' => 'required|integer',
            'pending_within_3_months_eighty_two' => 'required|integer',
            'pending_in_3_to_6_months_eighty_two' => 'required|integer',
            'pending_above_6_months_eighty_two' => 'required|integer',
            'total_pending_eighty_two' => 'required|integer',
            'pending_percentage_eighty_two' => 'required',
        ]);

        // Create a new instance of the model and populate it with the form data
        $eightytwo = new Jr_eightytwo();
        $eightytwo->region_name = Auth::user()->name;
        $eightytwo->eightytwodate = $request->input('eightytwodate');
        $eightytwo->ob_eighty_two = $request->input('ob_eighty_two');
        $eightytwo->ordered_this_month_eighty_two = $request->input('ordered_this_month_eighty_two');
        $eightytwo->total_ob_ordered_eighty_two = $request->input('total_ob_ordered_eighty_two');
        $eightytwo->completed_this_month_eighty_two = $request->input('completed_this_month_eighty_two');
        $eightytwo->pending_within_3_months_eighty_two = $request->input('pending_within_3_months_eighty_two');
        $eightytwo->pending_in_3_to_6_months_eighty_two = $request->input('pending_in_3_to_6_months_eighty_two');
        $eightytwo->pending_above_6_months_eighty_two = $request->input('pending_above_6_months_eighty_two');
        $eightytwo->total_pending_eighty_two = $request->input('total_pending_eighty_two');
        $eightytwo->pending_percentage_eighty_two = $request->input('pending_percentage_eighty_two');

        $eightytwo->save();

        return redirect('/jr/eightytwo/list')->with('status', '82-Inspection added successfully');
    }

    function seventeenaadd()
    {

        $jr = Jr_seventeena::select('*')->paginate(5);
        return view("jr.seventeena.add", compact('jr'));
    }
    function seventeenalist()
    {

        $jr = Jr_seventeena::select('*')->paginate(5);
        return view("jr.seventeena.list", compact('jr'));
    }

    function seventeenastore(Request $request)
    {
        $request->validate([
            'seventeenadate' => 'required',
            'disciplinary_ob_seventeena' => 'required|integer',
            'initiated_during_month_seventeena' => 'required|integer',
            'disciplinary_total_seventeena' => 'required|integer',
            'disposed_this_month_seventeena' => 'required|integer',
            'disciplinary_pending_seventeena' => 'required|integer',
            'disciplinary_pending_percentage_seventeena' => 'required|numeric',
            'disciplinary_ob_seventeenb' => 'required|integer',
            'initiated_during_month_seventeenb' => 'required|integer',
            'disciplinary_total_seventeenb' => 'required|integer',
            'disposed_this_month_seventeenb' => 'required|integer',
            'disciplinary_pending_seventeenb' => 'required|integer',
            'disciplinary_pending_percentage_seventeenb' => 'required',
        ]);

        $seventeena = new Jr_seventeena();
        $seventeena->region_name = Auth::user()->name;
        $seventeena->seventeenadate = $request->input('seventeenadate');
        $seventeena->disciplinary_ob_seventeena = $request->input('disciplinary_ob_seventeena');
        $seventeena->initiated_during_month_seventeena = $request->input('initiated_during_month_seventeena');
        $seventeena->disciplinary_total_seventeena = $request->input('disciplinary_total_seventeena');
        $seventeena->disposed_this_month_seventeena = $request->input('disposed_this_month_seventeena');
        $seventeena->disciplinary_pending_seventeena = $request->input('disciplinary_pending_seventeena');
        $seventeena->disciplinary_pending_percentage_seventeena = $request->input('disciplinary_pending_percentage_seventeena');
        $seventeena->disciplinary_ob_seventeenb = $request->input('disciplinary_ob_seventeenb');
        $seventeena->initiated_during_month_seventeenb = $request->input('initiated_during_month_seventeenb');
        $seventeena->disciplinary_total_seventeenb = $request->input('disciplinary_total_seventeenb');
        $seventeena->disposed_this_month_seventeenb = $request->input('disposed_this_month_seventeenb');
        $seventeena->disciplinary_pending_seventeenb = $request->input('disciplinary_pending_seventeenb');
        $seventeena->disciplinary_pending_percentage_seventeenb = $request->input('disciplinary_pending_percentage_seventeenb');
        $seventeena->save();

        return redirect('/jr/seventeena/list')->with('status', '17(A) & 17(B) added successfully');
    }


    function daiadd()
    {

        $jr = Jr_dai::select('*')->paginate(5);
        return view("jr.dai.add", compact('jr'));
    }
    function dailist()
    {

        $jr = Jr_dai::select('*')->paginate(5);
        return view("jr.dai.list", compact('jr'));
    }

    function daistore(Request $request)
    {
        $request->validate([
            'daidate' => 'required',
            'ob' => 'required|integer',
            'recommended_action' => 'required|string|max:255',
            'action_taken' => 'required|string|max:255',
            'disposal' => 'required|string|max:255',
            'percentage_of_disposal' => 'required',
        ]);


        $seventeena = new Jr_dai();
        $seventeena->region_name = Auth::user()->name;
        $seventeena->daidate = $request->input('daidate');
        $seventeena->ob = $request->input('ob');
        $seventeena->recommended_action = $request->input('recommended_action');
        $seventeena->action_taken = $request->input('action_taken');
        $seventeena->disposal = $request->input('disposal');
        $seventeena->percentage_of_disposal = $request->input('percentage_of_disposal');
        $seventeena->save();



        return redirect('/jr/dai/list')->with('status', 'Disciplinary Action Institution added successfully');
    }


    function surchargeadd()
    {

        $jr = Jr_surcharge::select('*')->paginate(5);
        return view("jr.surcharge.add", compact('jr'));
    }
    function surchargelist()
    {

        $jr = Jr_surcharge::select('*')->paginate(5);
        return view("jr.surcharge.list", compact('jr'));
    }

    function surchargestore(Request $request)
    {
        $request->validate([
            'surchargedate' => 'required',
            'surcharge_order_issued_number' => 'required|string|max:255',
            'surcharge_issued_amount' => 'required|numeric',
            'numbers_collected_during_month' => 'required|integer',
            'collected_amount' => 'required|numeric',
            'balance_numbers' => 'required|integer',
            'balance_amount' => 'required|numeric',
            'percentage_of_collection' => 'required',
        ]);

        // Create a new instance of the SurchargeData model and populate it with the form data
        $surchargeData = new Jr_surcharge();
        $surchargeData->region_name = Auth::user()->name;
        $surchargeData->surchargedate = $request->input('surchargedate');
        $surchargeData->surcharge_order_issued_number = $request->input('surcharge_order_issued_number');
        $surchargeData->surcharge_issued_amount = $request->input('surcharge_issued_amount');
        $surchargeData->numbers_collected_during_month = $request->input('numbers_collected_during_month');
        $surchargeData->collected_amount = $request->input('collected_amount');
        $surchargeData->balance_numbers = $request->input('balance_numbers');
        $surchargeData->balance_amount = $request->input('balance_amount');
        $surchargeData->percentage_of_collection = $request->input('percentage_of_collection');
        $surchargeData->save();

        return redirect('/jr/surcharge/list')->with('87- Surcharge Data added successfully');
    }


    function disqualifyadd()
    {

        $jr = Jr_disqualify::select('*')->paginate(5);
        return view("jr.disqualify.add", compact('jr'));
    }
    function disqualifylist()
    {

        $jr = Jr_disqualify::select('*')->paginate(5);
        return view("jr.disqualify.list", compact('jr'));
    }

    function disqualifystore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'disqualifydate' => 'required',
            'societies_ob' => 'required|integer',
            'board_of_directors_ob' => 'required|integer',
            'societies_im' => 'required|integer',
            'board_of_directors_im' => 'required|integer',
            'societies_total' => 'required|integer',
            'board_of_directors_total' => 'required|integer',
            'societies_dam' => 'required|integer',
            'board_of_directors_dam' => 'required|integer',
            'societies_pam' => 'required|integer',
            'board_of_directors_pam' => 'required|integer',
            'societies_pp' => 'required',
            'board_of_directors_pp' => 'required',
        ]);

        // Create a new instance of the model and populate it with the form data
        $societiesBoardDirectors = new Jr_disqualify();
        $societiesBoardDirectors->region_name = Auth::user()->name;
        $societiesBoardDirectors->disqualifydate = $request->input('disqualifydate');
        $societiesBoardDirectors->societies_ob = $request->input('societies_ob');
        $societiesBoardDirectors->board_of_directors_ob = $request->input('board_of_directors_ob');
        $societiesBoardDirectors->societies_im = $request->input('societies_im');
        $societiesBoardDirectors->board_of_directors_im = $request->input('board_of_directors_im');
        $societiesBoardDirectors->societies_total = $request->input('societies_total');
        $societiesBoardDirectors->board_of_directors_total = $request->input('board_of_directors_total');
        $societiesBoardDirectors->societies_dam = $request->input('societies_dam');
        $societiesBoardDirectors->board_of_directors_dam = $request->input('board_of_directors_dam');
        $societiesBoardDirectors->societies_pam = $request->input('societies_pam');
        $societiesBoardDirectors->board_of_directors_pam = $request->input('board_of_directors_pam');
        $societiesBoardDirectors->societies_pp = $request->input('societies_pp');
        $societiesBoardDirectors->board_of_directors_pp = $request->input('board_of_directors_pp');

        $societiesBoardDirectors->save();

        return redirect('/jr/disqualify/list')->with('status', '36 Disqualification added successfully');
    }
}
