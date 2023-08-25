<?php

namespace App\Http\Controllers;

use App\Models\Deposit_outstandings;
use Validator;

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

class SocietyController extends Controller
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

    function dashboard()
    {
        return view("dashboard");
    }

    function loanadd()
    {

        if (Auth::user()->role == 5) {

            $mtr_loan = Mtr_loan::all();
        } else if (Auth::user()->role == 6) {

            $mtr_loan = Mtr_loan::whereNotIn('id', [22])->get();
        } else if (Auth::user()->role == 7) {

            $mtr_loan =  Mtr_loan::whereIn('id', [11, 24, 25])->get();
        } else if (Auth::user()->role == 8) {

            $mtr_loan =  Mtr_loan::whereIn('id', [11, 24, 25])->get();
        } else if (Auth::user()->role == 9) {

            $mtr_loan =  Mtr_loan::whereIn('id', [1, 11, 22])->get();
        } else if (Auth::user()->role == 10) {

            $mtr_loan = Mtr_loan::whereNotIn('id', [22])->get();
        } else if (Auth::user()->role == 11) {

            $mtr_loan =  Mtr_loan::whereIn('id', [11, 16])->get();
        } else if (Auth::user()->role == 12) {

            $mtr_loan =  Mtr_loan::whereNotIn('id', [22, 23])->get();
        } else if (Auth::user()->role == 13) {

            $mtr_loan =  Mtr_loan::whereNotIn('id', [22, 23])->get();
        }

        return view("loan.add", compact('mtr_loan'));
    }

    function loanstore(Request $request)
    {

        $loan = new Loan;
        $loan->user_id = Auth::user()->id;
        $loan->loandate = $request->loandate;
        $loan->save();

        $arraycount = count($request->loantype_id);

        for ($i = 0; $i < $arraycount; $i++) {

            $loan_trans = new Loan_trans;

            $loan_trans->loan_id = $loan->id;
            $loan_trans->loantype_id = $request->loantype_id[$i];
            $loan_trans->disbursedno = $request->disbursedno[$i];
            $loan_trans->disbursedamount = $request->disbursedamount[$i];
            $loan_trans->collectedno = $request->collectedno[$i];
            $loan_trans->collectedamount = $request->collectedamount[$i];
            $loan_trans->save();
        }

        return redirect('/society/loan')->with('status', 'Issue of Loan and Collection added successfully');
        // return view("issue");
    }

    function loanlist()
    {

        $loans = Loan::where('user_id', Auth::user()->id)->get();

        return view("loan.list", compact('loans'));
    }

    function loantranslist(Request $request)
    {

        $loan_trans = Loan_trans::with('loantype')->where('loan_id', $request->id)->get();
        return view("loan.translist", compact('loan_trans'));
    }

    //Annual targer Form

    function annuallist()
    {

        $loan_onetimeentry = Loan_onetimeentry::where('user_id', Auth::user()->id)->get();

        return view("loan.annual.list", compact('loan_onetimeentry'));
    }

    function annualadd()
    {

        $mtr_loan = Mtr_loan::all();
        return view("loan.annual.add", compact('mtr_loan'));
    }

    function annualstore(Request $request)
    {

        $validated = $request->validate(
            [
                'loan_id' => 'required',
                'overall_outstanding' => 'required',
                'current_outstanding' => 'required',
                'current_year' => 'required',
                'annual_target' => 'required'
            ],
            [
                'loan_id.required' => 'Loan type field can not be blank value.',
                'overall_outstanding.required' => 'Overall outstanding field can not be blank value.',
                'current_outstanding.required' => 'Current outstanding field can not be blank value.',
                'current_year.required' => 'Current year field can not be blank value.',
                'annual_target.required' => 'Annual target field can not be blank value.'
            ]
        );

        $annual = new Loan_onetimeentry;
        $annual->user_id = Auth::user()->id;
        $annual->loan_id = $request->loan_id;
        $annual->overall_outstanding = $request->overall_outstanding;
        $annual->current_outstanding = $request->current_outstanding;
        $annual->current_year = $request->current_year;
        $annual->annual_target = $request->annual_target;
        $annual->save();


        return redirect('/society/loan/annual/add')->with('status', 'Annual Target & Outstanding added successfully');
        // return view("annual");
    }

    //deposit

    function depositlist()
    {

        $deposits = Deposits::where('user_id', Auth::user()->id)->get();

        return view("deposit.list", compact('deposits'));
    }

    function depositadd()
    {
        $mtr_deposits = Mtr_deposits::all();
        return view("deposit.add", compact('mtr_deposits'));
    }

    function depositstore(Request $request)
    {

        $arraycount = count($request->deposittype_id);

        for ($i = 0; $i < $arraycount; $i++) {

            $deposit = new Deposits;
            $deposit->user_id = Auth::user()->id;
            $deposit->depositdate = $request->depositdate;
            $deposit->deposit_id = $request->deposittype_id[$i];
            $deposit->recievedno = $request->recievedno[$i];
            $deposit->recievedamount = $request->recievedamount[$i];
            $deposit->closedno = $request->closedno[$i];
            $deposit->closedamount = $request->closedamount[$i];
            $deposit->save();
        }

        return redirect('/society/deposit/list')->with('status', 'Deposit added successfully');
    }


    //Annual targer Form

    function depositannuallist()
    {

        $deposit_onetimeentry = Deposit_onetimeentry::where('user_id', Auth::user()->id)->get();

        return view("deposit.annual.list", compact('deposit_onetimeentry'));
    }

    function depositannualadd()
    {

        $mtr_deposits = Mtr_deposits::all();
        return view("deposit.annual.add", compact('mtr_deposits'));
    }

    function depositannualstore(Request $request)
    {

        $validated = $request->validate(
            [
                'deposit_id' => 'required',
                'overall_outstanding' => 'required',
                'current_outstanding' => 'required',
                'current_year' => 'required',
                'annual_target' => 'required'
            ],
            [
                'deposit_id.required' => 'Loan type field can not be blank value.',
                'overall_outstanding.required' => 'Overall outstanding field can not be blank value.',
                'current_outstanding.required' => 'Current outstanding field can not be blank value.',
                'current_year.required' => 'Current year field can not be blank value.',
                'annual_target.required' => 'Annual target field can not be blank value.'
            ]
        );

        $annual = new Deposit_onetimeentry;
        $annual->user_id = Auth::user()->id;
        $annual->deposit_id = $request->deposit_id;
        $annual->overall_outstanding = $request->overall_outstanding;
        $annual->current_outstanding = $request->current_outstanding;
        $annual->current_year = $request->current_year;
        $annual->annual_target = $request->annual_target;
        $annual->save();


        return redirect('/society/deposit/annual/add')->with('status', 'Deposit Target and Outstanding added successfully');
        // return view("annual");
    }


    function purchaselist()
    {

        $purchases = Purchases::where('user_id', Auth::user()->id)->get();

        return view("purchase.list", compact('purchases'));
    }

    function purchaseadd()
    {
        $mtr_purchases = Mtr_purchase::all();
        return view("purchase.add", compact('mtr_purchases'));
    }

    function purchasestore(Request $request)
    {



        $arraycount = count($request->purchase_id);

        for ($i = 0; $i < $arraycount; $i++) {

            $purchases = new Purchases;
            $purchases->user_id = Auth::user()->id;
            $purchases->purchase_id = isset($request->purchase_id[$i]) ? $request->purchase_id[$i] : NULL;
            $purchases->purchasedate = $request->purchasedate;
            $purchases->govtnoofvarieties = isset($request->govtnoofvarieties[$i]) ? $request->govtnoofvarieties[$i] : NULL;
            $purchases->govtquantity = isset($request->govtquantity[$i]) ? $request->govtquantity[$i] : NULL;
            $purchases->govtvalues = isset($request->govtvalues[$i]) ? $request->govtvalues[$i] : NULL;
            $purchases->coopnoofvarieties = isset($request->coopnoofvarieties[$i]) ? $request->coopnoofvarieties[$i] : NULL;
            $purchases->coopquantity = isset($request->coopquantity[$i]) ? $request->coopquantity[$i] : NULL;
            $purchases->coopvalues = isset($request->coopvalues[$i]) ? $request->coopvalues[$i] : NULL;
            $purchases->jpcnoofvarieties = isset($request->jpcnoofvarieties[$i]) ? $request->jpcnoofvarieties[$i] : NULL;
            $purchases->jpcquantity = isset($request->jpcquantity[$i]) ? $request->jpcquantity[$i] : NULL;
            $purchases->jpcvalues = isset($request->jpcvalues[$i]) ? $request->jpcvalues[$i] : NULL;
            $purchases->privatenoofvarieties = isset($request->privatenoofvarieties[$i]) ? $request->privatenoofvarieties[$i] : NULL;
            $purchases->privatequantity = isset($request->privatequantity[$i]) ? $request->privatequantity[$i] : NULL;
            $purchases->privatevalues = isset($request->privatevalues[$i]) ? $request->privatevalues[$i] : NULL;
            $purchases->save();
        }



        return redirect('/society/purchase/add')->with('status', 'Purchase added successfully');
    }


    function saleslist()
    {

        $sales = Sales::where('user_id', Auth::user()->id)->get();

        return view("sales.list", compact('sales'));
    }

    function salesadd()
    {
        $mtr_sales = Mtr_sale::all();
        return view("sales.add", compact('mtr_sales'));
    }

    function salesstore(Request $request)
    {

        $sales = new Sales;
        $sales->user_id = Auth::user()->id;
        $sales->sale_id = $request->sale_id;
        $sales->saledate = $request->saledate;
        $sales->noofvarieties = isset($request->noofvarieties) ? $request->noofvarieties : NULL;
        $sales->noofoutlets = isset($request->noofoutlets) ? $request->noofoutlets : NULL;
        $sales->noofcustomers = isset($request->noofcustomers) ? $request->noofcustomers : NULL;
        $sales->nooffarmers = isset($request->nooffarmers) ? $request->nooffarmers : NULL;
        $sales->quantitykilo = isset($request->quantitykilo) ? $request->quantitykilo : NULL;
        $sales->quantitylitres = isset($request->quantitylitres) ? $request->quantitylitres : NULL;
        $sales->salesamountphysical = isset($request->salesamountphysical) ? $request->salesamountphysical : NULL;
        $sales->salesamountcoopbazaar = isset($request->salesamountcoopbazaar) ? $request->salesamountcoopbazaar : NULL;
        $sales->save();

        return redirect('/society/sale/add')->with('status', 'Sale added successfully');
    }

    function godownlist()
    {

        $godowns = Godowns::where('user_id', Auth::user()->id)->get();
        return view("godown.list", compact('godowns'));
    }

    function godownadd()
    {
        return view("godown.add");
    }

    function godownstore(Request $request)
    {

        $validated = $request->validate(
            [
                'godowndate' => 'required',
                'count' => 'required',
                'capacity' => 'required',
                'utilized' => 'required',
                'percentageutilized' => 'required',
                'income' => 'required',
            ],
            [
                'godowndate.required' => 'The Godown date field can not be blank value.',
                'count.required' => 'The Countfield can not be blank value.',
                'capacity.required' => 'The capacity field can not be blank value.',
                'utilized.required' => 'Utilized Field can not be blank value.',
                'percentageutilized.required' => 'Percentage Utilization field can not be blank value.',
                'income.required' => 'Income field can not be blank value.',
            ]

        );


        $godowns = new Godowns;
        $godowns->user_id = Auth::user()->id;
        $godowns->godowndate = $request->godowndate;
        $godowns->count = $request->count;
        $godowns->capacity = $request->capacity;
        $godowns->utilized = $request->utilized;
        $godowns->percentageutilized = $request->percentageutilized;
        $godowns->income = $request->income;
        $godowns->save();

        return redirect('/society/godown/add')->with('status', 'Godown added successfully');
    }


    function serviceslist()
    {

        $services = Services::where('user_id', Auth::user()->id)->get();

        return view("services.list", compact('services'));
    }

    function servicesadd()
    {
        $mtr_services = Mtr_services::all();
        return view("services.add", compact('mtr_services'));
    }

    function servicesstore(Request $request)
    {

        $services = new Services;
        $services->user_id = Auth::user()->id;
        $services->services_id = $request->services_id;
        $services->servicesdate = $request->servicesdate;
        $services->count = $request->count;
        $services->noofcenters = isset($request->noofcenters) ? $request->noofcenters : NULL;
        $services->noofvarieties = isset($request->noofvarieties) ? $request->noofvarieties : NULL;
        $services->noofcustomers = isset($request->noofcustomers) ? $request->noofcustomers : NULL;
        $services->nooffarmers = isset($request->nooffarmers) ? $request->nooffarmers : NULL;
        $services->quantitykilo = isset($request->quantitykilo) ? $request->quantitykilo : NULL;
        $services->quantitylitres = isset($request->quantitylitres) ? $request->quantitylitres : NULL;
        $services->purchase = $request->purchase;
        $services->salesamountetrading = isset($request->salesamountetrading) ? $request->salesamountetrading : NULL;
        $services->salesamountphysical = isset($request->salesamountphysical) ? $request->salesamountphysical : NULL;
        $services->income = $request->income;
        $services->profit = $request->profit;
        $services->save();

        return redirect('/society/services/add')->with('status', 'Services added successfully');
    }

    //Deposit
    function outstandinglist()
    {

        $deposit_outstandings = Deposit_outstandings::where('user_id', Auth::user()->id)->get();

        return view("deposit.outstanding.list", compact('deposit_outstandings'));
    }

    function outstandingadd()
    {
        return view("deposit.outstanding.add");
    }

    function outstandingstore(Request $request)
    {

        $validated = $request->validate([
            'recieveddate' => 'required',
            'recievedothersno' => 'required',
            'recievedothersamount' => 'required',
            'closeddate' => 'required',
            'closeddothersno' => 'required',
            'closeddothersamount' => 'required'
        ]);

        $recievedtotalno = $request->scstno + $request->recievedothersno;
        $recievedtotalamount = $request->scstamount + $request->recievedothersamount;
        $closedtotalno = $request->scstno + $request->closedothersno;
        $closedtotalamount = $request->scstamount + $request->closedothersamount;
        $outstandings = new Deposit_outstandings;
        $outstandings->user_id = Auth::user()->id;
        $outstandings->recieveddate = $request->recieveddate;
        $outstandings->recievedothersno = $request->recievedothersno;
        $outstandings->recievedothersamount = $request->recievedothersamount;
        $outstandings->recievedtotalno = $recievedtotalno;
        $outstandings->recivedtotalamount = $recievedtotalamount;
        $outstandings->closeddate = $request->closeddate;
        $outstandings->closedothersno = $request->closedothersno;
        $outstandings->closeddothersamount = $request->closeddothersamount;
        $outstandings->closedtotalno = $closedtotalno;
        $outstandings->closedtotalamount = $closedtotalamount;
        $outstandings->save();

        return redirect('/society/deposit/outstanding/add')->with('status', 'Outstanding Deposit added successfully');
    }


    //Crop target
    function croploantargetlist()
    {

        $croploan_target = Croploan_target::where('user_id', Auth::user()->id)->get();

        return view("croploan.target.list", compact('croploan_target'));
    }

    function croploantargetadd()
    {
        return view("croploan.target.add");
    }

    function croploantargetstore(Request $request)
    {

        $validated = $request->validate([
            'month' => 'required',
            'target' => 'required'
        ]);

        $croploan_target = new Croploan_target;
        $croploan_target->user_id = Auth::user()->id;
        $croploan_target->month = $request->month;
        $croploan_target->target = $request->target;
        $croploan_target->status = 1;
        $croploan_target->save();

        return redirect('/society/croploan/target/add')->with('status', 'Crop Loan target added successfully');
    }


    //Crop target
    function croploanentrylist()
    {

        $croploan_entry = Croploan_entry::where('user_id', Auth::user()->id)->get();

        return view("croploan.entry.list", compact('croploan_entry'));
    }

    function croploanentryadd()
    {
        return view("croploan.entry.add");
    }

    function croploanentrystore(Request $request)
    {

        $validated = $request->validate(
            [
                'croploandate' => 'required',
                'applicationsreceived' => 'required',
                'applicationssanctioned' => 'required',
                'applicationspending' => 'required',
                'totalcultivatedarea' => 'required',
                'loanissuedarea' => 'required',
                'outstandingno' => 'required',
                'outstandingamount' => 'required',
                'overdueno' => 'required'
            ],
            [
                'croploandate.required' => 'The Crop loan date field can not be blank value.',
                'applicationsreceived.required' => 'The Application Received can not be blank value.',
                'applicationssanctioned.required' => 'The Application Sanctioned can not be blank value.',
                'applicationspending.required' => 'Application Pending can not be blank value.',
                'totalcultivatedarea.required' => 'Total cutivated area field can not be blank value.',
                'loanissuedarea.required' => 'Loan issued area can not be blank value.',
                'outstandingno.required' => 'Outstanding number can not be blank value.',
                'outstandingamount.required' => 'Outstanding amount can not be blank value.',
                'overdueno.required' => 'Overdue number can not be blank value.',
                'overdueno.required' => 'Overdue amount can not be blank value.',
            ]
        );

        $croploan_entry = new Croploan_entry;
        $croploan_entry->user_id = Auth::user()->id;
        $croploan_entry->croploandate = $request->croploandate;
        $croploan_entry->applicationsreceived = $request->applicationsreceived;
        $croploan_entry->applicationssanctioned = $request->applicationssanctioned;
        $croploan_entry->applicationspending = $request->applicationspending;
        $croploan_entry->totalcultivatedarea = $request->totalcultivatedarea;
        $croploan_entry->loanissuedarea = $request->loanissuedarea;
        $croploan_entry->outstandingno = $request->outstandingno;
        $croploan_entry->outstandingamount = $request->outstandingamount;
        $croploan_entry->overdueno = $request->overdueno;
        $croploan_entry->overdueamount = $request->overdueamount;
        $croploan_entry->save();

        return redirect('/society/croploan/entry/add')->with('status', 'Crop entry added successfully');
    }
}
