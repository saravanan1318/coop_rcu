<?php

namespace App\Http\Controllers;

use App\Models\Deposit_outstandings;
use Validator;

//deposit
use App\Models\Deposits;
use App\Models\Mtr_deposits;
use App\Models\Deposit_onetimeentry;
use App\Models\Godowns;
use App\Models\Loan_annual;
use App\Models\Loan_collection;
use App\Models\Loan_issues;
use App\Models\Loan_overallot;
use App\Models\Mtr_loan;
use App\Models\Loan_onetimeentry;
use App\Models\Loan_issuesnew;

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


class SocietyController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    //
    function index(){
        return view("login");
    }

    function dashboard(){
        return view("dashboard");
    }

    //Issue Form
    function issuelist(){

        $loan_issues = Loan_issues::where('user_id', Auth::user()->id)->get();

        return view("loan.issue.list", compact('loan_issues'));
    }

    function issueadd(){

        if(Auth::user()->role == 5){

            $mtr_loan = Mtr_loan::all();

        }else if(Auth::user()->role == 6){

            $mtr_loan = Mtr_loan::whereNotIn('id', [22]);

        }else if(Auth::user()->role == 7){

            $mtr_loan =  Mtr_loan::whereIn('id', [11,24,25]);

        }else if(Auth::user()->role == 8){

            $mtr_loan =  Mtr_loan::whereIn('id', [11,24,25]);

        }else if(Auth::user()->role == 9){

            $mtr_loan =  Mtr_loan::whereIn('id', [1,11,22]);

        }
        else if(Auth::user()->role == 10){

            $mtr_loan = Mtr_loan::whereNotIn('id', [22]);

        }
        else if(Auth::user()->role == 11){

            $mtr_loan =  Mtr_loan::whereIn('id', [11,16]);

        }
        else if(Auth::user()->role == 12){

            $mtr_loan =  Mtr_loan::whereNotIn('id', [22,23]);

        }
        else if(Auth::user()->role == 13){

            $mtr_loan =  Mtr_loan::whereNotIn('id', [22,23]);

        }

        return view("loan.issue.add", compact('mtr_loan'));
    }

    function issuestore(Request $request){

        $validator = $request->validate([
            'loan_id' => 'required',
            'issuedate' => 'required',
            'loan_id' => 'required',
            'scstno' => 'required|numeric',
            'scstamount' => 'required|numeric',
            'othersno' => 'required|numeric',
            'othersamount' => 'required|numeric'
        ],
        [
             'loan_id.required' => 'The Loan type field can not be blank value.',
             'issuedate.required' => 'The Issue date field can not be blank value.',
             'loan_id.required' => 'Loan type field can not be blank value.',
             'scstno.required' => 'SC / ST No. field can not be blank value.',
             'scstamount.required' => 'SC / ST Amount field can not be blank value.',
             'othersno.required' => 'Others Amount field can not be blank value.',
             'othersamount.required' => 'Others No field can not be blank value.',
             'scstno.numeric' => 'SC / ST No. field can must be numeric.',
             'scstamount.numeric' => 'SC / ST Amount field must be numeric.',
             'othersno.numeric' => 'Others No field must be numeric.',
             'othersamount.numeric' => 'Others Amount field must be numeric.',
        ]);

        $totalno = $request->scstno + $request->othersno;
        $totalamount = $request->scstamount + $request->othersamount;
        $issues = new Loan_issues;
        $issues->user_id = Auth::user()->id;
        $issues->loan_id = $request->loan_id;
        $issues->issuedate = $request->issuedate;
        $issues->scstno = $request->scstno;
        $issues->scstamount = $request->scstamount;
        $issues->othersno = $request->othersno;
        $issues->othersamount = $request->othersamount;
        $issues->totalno = $totalno;
        $issues->totalamount = $totalamount;
        $issues->save();


        return redirect('/society/loan/issue/add')->with('status', 'Loan issue added successfully');

    }
 //Issue new Form
 function issuelistnew(){

    $loan_issuesnew = Loan_issuesnew::where('user_id', Auth::user()->id)->get();

    return view("loan.issuenew.listnew", compact('loan_issuesnew'));
}

function issueaddnew(){

    if(Auth::user()->role == 5){

        $mtr_loan = Mtr_loan::all();

    }else if(Auth::user()->role == 6){

        $mtr_loan = Mtr_loan::whereNotIn('id', [22]);

    }else if(Auth::user()->role == 7){

        $mtr_loan =  Mtr_loan::whereIn('id', [11,24,25]);

    }else if(Auth::user()->role == 8){

        $mtr_loan =  Mtr_loan::whereIn('id', [11,24,25]);

    }else if(Auth::user()->role == 9){

        $mtr_loan =  Mtr_loan::whereIn('id', [1,11,22]);

    }
    else if(Auth::user()->role == 10){

        $mtr_loan = Mtr_loan::whereNotIn('id', [22]);

    }
    else if(Auth::user()->role == 11){

        $mtr_loan =  Mtr_loan::whereIn('id', [11,16]);

    }
    else if(Auth::user()->role == 12){

        $mtr_loan =  Mtr_loan::whereNotIn('id', [22,23]);

    }
    else if(Auth::user()->role == 13){

        $mtr_loan =  Mtr_loan::whereNotIn('id', [22,23]);

    }

    return view("loan.issuenew.addnew", compact('mtr_loan'));
}

function issuestorenew(Request $request){

    $validator = $request->validate([
        'loan_id' => 'required',
        'issuedate' => 'required',
        'loan_id' => 'required',
        'scstno' => 'required|numeric',
        'scstamount' => 'required|numeric',
        'othersno' => 'required|numeric',
        'othersamount' => 'required|numeric'
    ],
    [
         'loan_id.required' => 'The Loan type field can not be blank value.',
         'issuedate.required' => 'The Issue date field can not be blank value.',
         'loan_id.required' => 'Loan type field can not be blank value.',
         'scstno.required' => 'SC / ST No. field can not be blank value.',
         'scstamount.required' => 'SC / ST Amount field can not be blank value.',
         'othersno.required' => 'Others Amount field can not be blank value.',
         'othersamount.required' => 'Others No field can not be blank value.',
         'scstno.numeric' => 'SC / ST No. field can must be numeric.',
         'scstamount.numeric' => 'SC / ST Amount field must be numeric.',
         'othersno.numeric' => 'Others No field must be numeric.',
         'othersamount.numeric' => 'Others Amount field must be numeric.',
    ]);

    $totalno = $request->scstno + $request->othersno;
    $totalamount = $request->scstamount + $request->othersamount;
    $issues = new Loan_issuesnew;
    $issues->user_id = Auth::user()->id;
    $issues->loan_id = $request->loan_id;
    $issues->issuedate = $request->issuedate;
    $issues->scstno = $request->scstno;
    $issues->scstamount = $request->scstamount;
    $issues->othersno = $request->othersno;
    $issues->othersamount = $request->othersamount;
    $issues->totalno = $totalno;
    $issues->totalamount = $totalamount;
    $issues->save();


    return redirect('/society/loan/issuenew/addnew')->with('status', 'Loan issue added successfully');

}

    //Collection Form

    function collectionlist(){

        $loan_collection = Loan_collection::where('user_id', Auth::user()->id)->get();

        return view("loan.collection.list", compact('loan_collection'));
    }

    function collectionadd(){

        $mtr_loan = Mtr_loan::all();
        return view("loan.collection.add", compact('mtr_loan'));
    }

    function collectionstore(Request $request){

        $validated = $request->validate([
            'collectiondate' => 'required',
            'loan_id' => 'required',
            'scstno' => 'required|numeric',
            'scstamount' => 'required|numeric',
            'othersno' => 'required|numeric',
            'othersamount' => 'required|numeric'
        ],
        [
             'collectiondate.required' => 'The Collection date field can not be blank value.',
             'loan_id.required' => 'The Loan type field can not be blank value.',
             'scstno.required' => 'The SC / ST No. field can not be blank value.',
             'scstamount.required' => 'The SC / ST Amount field can not be blank value.',
             'othersno.required' => 'The Others Amount field can not be blank value.',
             'othersamount.required' => 'The Others No field can not be blank value.',
             'scstno.numeric' => 'The SC / ST No. field can must be numeric.',
             'scstamount.numeric' => 'The SC / ST Amount field must be numeric.',
             'othersno.numeric' => 'The Others No field must be numeric.',
             'othersamount.numeric' => 'TheOthers Amount field must be numeric.',
        ]);

        $totalno = $request->scstno + $request->othersno;
        $totalamount = $request->scstamount + $request->othersamount;
        $collection = new Loan_collection;
        $collection->user_id = Auth::user()->id;
        $collection->loan_id = $request->loan_id;
        $collection->collectiondate = $request->collectiondate;
        $collection->scstno = $request->scstno;
        $collection->scstamount = $request->scstamount;
        $collection->othersno = $request->othersno;
        $collection->othersamount = $request->othersamount;
        $collection->totalno = $totalno;
        $collection->totalamount = $totalamount;
        $collection->save();


        return redirect('/society/loan/collection/add')->with('status', 'Loan collection added successfully');
       // return view("collection");
    }

    //Annual targer Form

    function annuallist(){

        $loan_onetimeentry = Loan_onetimeentry::where('user_id', Auth::user()->id)->get();

        return view("loan.annual.list", compact('loan_onetimeentry'));
    }

    function annualadd(){

        $mtr_loan = Mtr_loan::all();
        return view("loan.annual.add", compact('mtr_loan'));
    }

    function annualstore(Request $request){

        $validated = $request->validate([
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
        ]);

        $annual = new Loan_onetimeentry;
        $annual->user_id = Auth::user()->id;
        $annual->loan_id = $request->loan_id;
        $annual->overall_outstanding = $request->overall_outstanding;
        $annual->current_outstanding = $request->current_outstanding;
        $annual->current_year = $request->current_year;
        $annual->annual_target = $request->annual_target;
        $annual->save();


        return redirect('/society/loan/annual/add')->with('status', 'Loan issue added successfully');
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

        $validated = $request->validate([
            'deposit_id' => 'required',
            'depositdate' => 'required',
            'recievedno' => 'required',
            'recievedamount' => 'required',
            'closedno' => 'required',
            'closedamount' => 'required'
        ],
        [
             'deposit_id.required' => 'The Deposit type field can not be blank value.',
             'depositdate.required' => 'The Deposit date field can not be blank value.',
             'recievedno.required' => 'Received No. field can not be blank value.',
             'recievedamount.required' => 'Received Amount field can not be blank value.',
             'closedno.required' => 'Closed No. field can not be blank value.',
             'closedamount.required' => 'Closed Amount field can not be blank value.'
        ]);

        $deposits = new Deposits;
        $deposits->user_id = Auth::user()->id;
        $deposits->deposit_id = $request->deposit_id;
        $deposits->depositdate = $request->depositdate;
        $deposits->recievedno = $request->recievedno;
        $deposits->recievedamount = $request->recievedamount;
        $deposits->closedno = $request->closedno;
        $deposits->closedamount = $request->closedamount;
        $deposits->save();

        return redirect('/society/deposit/add')->with('status', 'Deposit added successfully');
    }


    //Annual targer Form

    function depositannuallist(){

        $deposit_onetimeentry = Deposit_onetimeentry::where('user_id', Auth::user()->id)->get();

        return view("deposit.annual.list", compact('deposit_onetimeentry'));
    }

    function depositannualadd(){

        $mtr_deposits = Mtr_deposits::all();
        return view("deposit.annual.add", compact('mtr_deposits'));
    }

    function depositannualstore(Request $request){

        $validated = $request->validate([
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
        ]);

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

        $purchases = new Purchases;
        $purchases->user_id = Auth::user()->id;
        $purchases->purchase_id = $request->purchase_id;
        $purchases->purchasedate = $request->purchasedate;
        $purchases->govtnoofvarieties = isset($request->govtnoofvarieties) ? $request->govtnoofvarieties : NULL;
        $purchases->govtquantity = isset($request->govtquantity) ? $request->govtquantity : NULL;
        $purchases->govtvalues = isset($request->govtvalues) ? $request->govtvalues : NULL;
        $purchases->coopnoofvarieties = isset($request->coopnoofvarieties) ? $request->coopnoofvarieties : NULL;
        $purchases->coopquantity = isset($request->coopquantity) ? $request->coopquantity : NULL;
        $purchases->coopvalues = isset($request->coopvalues) ? $request->coopvalues : NULL;
        $purchases->jpcnoofvarieties = isset($request->jpcnoofvarieties) ? $request->jpcnoofvarieties : NULL;
        $purchases->jpcquantity = isset($request->jpcquantity) ? $request->jpcquantity : NULL;
        $purchases->jpcvalues = isset($request->jpcvalues) ? $request->jpcvalues : NULL;
        $purchases->privatenoofvarieties = isset($request->privatenoofvarieties) ? $request->privatenoofvarieties : NULL;
        $purchases->privatequantity =isset($request->privatequantity) ? $request->privatequantity : NULL;
        $purchases->privatevalues =isset($request->privatevalues) ? $request->privatevalues : NULL;
        $purchases->save();

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

         $validated = $request->validate([
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
         ]);

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
