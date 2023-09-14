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
use App\Models\Dr;
use App\Models\Mtr_services;
use App\Models\Mtr_crop;
use App\Models\Services;

class SocietyController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         if (Auth::check() && Auth::user()->role > 4) {
    //             return $next($request);
    //         }
    //         abort(403);
    //     });
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

        // if (Auth::user()->role == 5) {


        // } else if (Auth::user()->role == 6) {

        //     $mtr_loan = Mtr_loan::whereNotIn('id', [22])->get();
        // } else if (Auth::user()->role == 7) {

        //     $mtr_loan =  Mtr_loan::whereIn('id', [11, 24, 25])->get();
        // } else if (Auth::user()->role == 8) {

        //     $mtr_loan =  Mtr_loan::whereIn('id', [11, 24, 25])->get();
        // } else if (Auth::user()->role == 9) {

        //     $mtr_loan =  Mtr_loan::whereIn('id', [1, 11, 22])->get();
        // } else if (Auth::user()->role == 10) {

        //     $mtr_loan = Mtr_loan::all();
        // } else if (Auth::user()->role == 11) {

        //     $mtr_loan =  Mtr_loan::whereIn('id', [11, 16])->get();
        // } else if (Auth::user()->role == 12) {

        //     $mtr_loan =  Mtr_loan::whereNotIn('id', [22, 23])->get();
        // } else if (Auth::user()->role == 13) {

        //     $mtr_loan =  Mtr_loan::whereNotIn('id', [22, 23])->get();
        // }

        $mtr_loan = Mtr_loan::all();
        return view("loan.add", compact('mtr_loan'));
    }

    function loanstore(Request $request)
    {

        $arraycount = count($request->loantype_id);

        for ($i = 0; $i < $arraycount; $i++) {

            $loan = new Loan;
            $loan->user_id = Auth::user()->id;
            $loan->loandate = $request->loandate;
            $loan->loantype_id = $request->loantype_id[$i];
            $loan->disbursedno = $request->disbursedno[$i];
            $loan->disbursedamount = $request->disbursedamount[$i];
            $loan->collectedno = $request->collectedno[$i];
            $loan->collectedamount = $request->collectedamount[$i];
            $loan->save();
        }

        return redirect('/society/loan')->with('status', 'Issue of Loan and Collection added successfully');
        // return view("issue");
    }

    function loanlist()
    {

        $loans = Loan::where('user_id', Auth::user()->id)->paginate(5);

        return view("loan.list", compact('loans'));
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

        $deposits = Deposits::where('user_id', Auth::user()->id)->paginate(5);

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

        $purchases = Purchases::where('user_id', Auth::user()->id)->paginate(5);

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

        $sales = Sales::where('user_id', Auth::user()->id)->paginate(5);

        return view("sales.list", compact('sales'));
    }

    function salesadd()
    {
        $mtr_sales = Mtr_sale::all();
        return view("sales.add", compact('mtr_sales'));
    }

    function salesstore(Request $request)
    {

        $arraycount = count($request->sale_id);

        for ($i = 0; $i < $arraycount; $i++) {

            $sales = new Sales;
            $sales->user_id = Auth::user()->id;
            $sales->sale_id = isset($request->sale_id[$i]) ? $request->sale_id[$i] : NULL;
            $sales->saledate = $request->saledate;
            $sales->noofvarieties = isset($request->noofvarieties[$i]) ? $request->noofvarieties[$i] : NULL;
            $sales->noofoutlets = isset($request->noofoutlets[$i]) ? $request->noofoutlets[$i] : NULL;
            $sales->noofcustomers = isset($request->noofcustomers[$i]) ? $request->noofcustomers[$i] : NULL;
            $sales->nooffarmers = isset($request->nooffarmers[$i]) ? $request->nooffarmers[$i] : NULL;
            $sales->quantitykilo = isset($request->quantitykilo[$i]) ? $request->quantitykilo[$i] : NULL;
            $sales->quantitylitres = isset($request->quantitylitres[$i]) ? $request->quantitylitres[$i] : NULL;
            $sales->salesamountphysical = isset($request->salesamountphysical[$i]) ? $request->salesamountphysical[$i] : NULL;
            $sales->salesamountcoopbazaar = isset($request->salesamountcoopbazaar[$i]) ? $request->salesamountcoopbazaar[$i] : NULL;
            $sales->save();
        }


        return redirect('/society/sale/add')->with('status', 'Sale added successfully');
    }

    function godownlist()
    {

        $godowns = Godowns::where('user_id', Auth::user()->id)->paginate(5);
        return view("godown.list", compact('godowns'));
    }

    function godownadd()
    {
        return view("godown.add");
    }

    function godownstore(Request $request)
    {


        $arraycount = count($request->count);

        for ($i = 0; $i < $arraycount; $i++) {

            $godowns = new Godowns;
            $godowns->user_id = Auth::user()->id;
            $godowns->godowndate = $request->godowndate;
            $godowns->count = isset($request->count[$i]) ? $request->count[$i] : NULL;
            $godowns->capacity = isset($request->capacity[$i]) ? $request->capacity[$i] : NULL;
            $godowns->utilized = isset($request->utilized[$i]) ? $request->utilized[$i] : NULL;
            $godowns->percentageutilized = isset($request->percentageutilized[$i]) ? $request->percentageutilized[$i] : NULL;
            $godowns->income = isset($request->income[$i]) ? $request->income[$i] : NULL;
            $godowns->save();
        }



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
        //dd($request);

        $arraycount = count($request->count);

        for ($i = 0; $i < $arraycount; $i++) {

            $services = new Services;
            $services->user_id = Auth::user()->id;
            $services->services_id = isset($request->service_id[$i]) ? $request->service_id[$i] : NULL;
            $services->servicesdate = $request->servicedate;
            $services->count =  isset($request->count[$i]) ? $request->count[$i] : NULL;
            $services->noofcentres = isset($request->noofcentres[$i]) ? $request->noofcentres[$i] : NULL;
            $services->noofvarieties = isset($request->noofvarieties[$i]) ? $request->noofvarieties[$i] : NULL;
            $services->noofcustomers = isset($request->noofcustomers[$i]) ? $request->noofcustomers[$i] : NULL;
            $services->nooffarmers = isset($request->nooffarmers[$i]) ? $request->nooffarmers[$i] : NULL;
            $services->quantitykilos = isset($request->quantitykilos[$i]) ? $request->quantitykilos[$i] : NULL;
            $services->quantitylitres = isset($request->quantitylitres[$i]) ? $request->quantitylitres[$i] : NULL;
            $services->purchase = isset($request->purchase[$i]) ? $request->purchase[$i] : NULL;
            $services->salesamountetrading = isset($request->salesamountetrading[$i]) ? $request->salesamountetrading[$i] : NULL;
            $services->salesamountphysical = isset($request->salesamountphysical[$i]) ? $request->salesamountphysical[$i] : NULL;
            $services->incomegenerated = isset($request->incomegenerated[$i]) ? $request->incomegenerated[$i] : NULL;
            $services->profit = isset($request->profit[$i]) ? $request->profit[$i] : NULL;

            $services->save();
        }

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
    function croploanentrycropwiselist(Request $request)
    {

        $croploan_cropwise = Croploan_cropwise::where('croploan_id', $request->route('croploan_id'))->paginate(5);

        return view("croploan.entry.cropwiselist", compact('croploan_cropwise'));
    }

    function croploanentryadd()
    {
        $mtr_crop = Mtr_crop::all();
        return view("croploan.entry.add", compact('mtr_crop'));
    }

    function croploanentrylist()
    {
        $croploan_entry = Croploan_entry::all();
        return view("croploan.entry.list", compact('croploan_entry'));
    }

    function croploanentrystore(Request $request)
    {

        $validatedData = $request->validate([
            'croploandate' => 'required',
            'annualTarget' => 'required',
            'proportionateTarget' => 'required',
            'cultivableLand' => 'required',
            'openingBalanceNo' => 'required',
            'openingBalanceAmount' => 'required',
            'receivedNo' => 'required',
            'receivedAmount' => 'required',
            'totalNo' => 'required',
            'totalAmount' => 'required',
            'sanctionedNo' => 'required',
            'sanctionedAmount' => 'required',
            'sanctionedLand' => 'required',
            'achievementAnnual' => 'required',
            'achievementProportionate' => 'required',
            'rejectedno' => 'required',
            'applicationpendingno' => 'required',
            'applicationpendingamount' => 'required',
        ]);


        $croploan = new Croploan_entry();
        $croploan->croploandate = $request->input('croploandate');
        $croploan->annualTarget = $request->input('annualTarget');
        $croploan->proportionateTarget = $request->input('proportionateTarget');
        $croploan->cultivableLand = $request->input('cultivableLand');
        $croploan->openingBalanceNo = $request->input('openingBalanceNo');
        $croploan->openingBalanceAmount = $request->input('openingBalanceAmount');
        $croploan->receivedNo = $request->input('receivedNo');
        $croploan->receivedAmount = $request->input('receivedAmount');
        $croploan->totalNo = $request->input('totalNo');
        $croploan->totalAmount = $request->input('totalAmount');
        $croploan->sanctionedNo = $request->input('sanctionedNo');
        $croploan->sanctionedAmount = $request->input('sanctionedAmount');
        $croploan->sanctionedLand = $request->input('sanctionedLand');
        $croploan->achievementAnnual = $request->input('achievementAnnual');
        $croploan->achievementProportionate = $request->input('achievementProportionate');
        $croploan->rejectedno = $request->input('rejectedno');
        $croploan->applicationpendingno = $request->input('applicationpendingno');
        $croploan->applicationpendingamount = $request->input('applicationpendingamount');
        $croploan->save();
        return redirect('/society/croploan')->with('status', 'Crop entry added successfully');
    }
}
