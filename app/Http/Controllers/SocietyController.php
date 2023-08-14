<?php

namespace App\Http\Controllers;

use Validator;

//deposit
use App\Models\Deposit_currents;
use App\Models\Deposit_fdgovts;
use App\Models\Deposit_fdinds;
use App\Models\Deposit_fdists;
use App\Models\Deposit_outstandings;
use App\Models\Deposit_rds;
use App\Models\Deposit_sbs;
use App\Models\Godowns;
use App\Models\Loan_annual;
use App\Models\Loan_collection;
use App\Models\Loan_issues;
use App\Models\Loan_overallot;
use App\Models\Mtr_loan;
use App\Models\Loan_onetimeentry;

//purchase
use App\Models\purchase_Fertilizer;
use App\Models\Purchase_ffo;
use App\Models\Purchase_ncc;
use App\Models\Purchase_pdbunk;
use App\Models\Purchase_pharmacy;
use App\Models\sales_Fertilizer;
use App\Models\Sales_ffo;
use App\Models\Sales_ncc;
use App\Models\Sales_pdbunk;
use App\Models\Sales_pharmacy;
//services
use App\Models\Services_agris;
use App\Models\Services_cscs;
use App\Models\Services_drys;
use App\Models\Services_lodgings;
use App\Models\Services_pss;
use App\Models\Services_psss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

        $mtr_loan = Mtr_loan::all();
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
       // return view("issue");
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
    //Overall Outstanding targer Form

    function overallotlist(){

        $loan_overallot = Loan_overallot::where('user_id', Auth::user()->id)->get();

        return view("loan.overallot.list", compact('loan_overallot'));
    }

    function overallotadd(){
        return view("loan.overallot.add");
    }

    function overallotstore(Request $request){

        $validated = $request->validate([
            'issuedate' => 'required',
            'scstno' => 'required',
            'scstamount' => 'required',
            'othersno' => 'required',
            'othersamount' => 'required'
        ]);

        $totalno = $request->scstno + $request->othersno;
        $totalamount = $request->scstamount + $request->othersamount;
        $overallot = new Loan_overallot;
        $overallot->user_id = Auth::user()->id;
        $overallot->issuedate = $request->issuedate;
        $overallot->scstno = $request->scstno;
        $overallot->scstamount = $request->scstamount;
        $overallot->othersno = $request->othersno;
        $overallot->othersamount = $request->othersamount;
        $overallot->totalno = $totalno;
        $overallot->totalamount = $totalamount;
        $overallot->save();


        return redirect('/society/loan/overallot/add')->with('status', 'Loan issue added successfully');
        // return view("overallot");
    }

        //   //purchase_pharmacy
        function Pharmacylist(){

        $purchase_Pharmacy = Purchase_pharmacy::where('user_id', Auth::user()->id)->get();

        return view("purchase.pharmacy.list", compact('purchase_Pharmacy'));
    }

    function Pharmacyadd(){
        return view("purchase.pharmacy.add");
    }

    function pharmacystore(Request $request){

        $validated = $request->validate([
            'pharmacydate' => 'required',
            'scstno' => 'required',
            'scstamount' => 'required',
            'othersno' => 'required',
            'othersamount' => 'required'
        ]);

        $totalno = $request->scstno + $request->othersno;
        $totalamount = $request->scstamount + $request->othersamount;
        $pharmacy = new Purchase_Pharmacy;
        $pharmacy->user_id = Auth::user()->id;
        $pharmacy->issuedate = $request->issuedate;
        $pharmacy->qty = $request->qty;
        $pharmacy->amount = $request->amount;
        $pharmacy->totalamount = $totalamount;
        $pharmacy->save();


        return redirect('/society/purchase/pharmacy/add')->with('status', 'pharmacy added successfully');
        // return view("issue");
    }
//purchase_ffo
function ffolist(){

    $purchase_ffo = Purchase_ffo::where('user_id', Auth::user()->id)->get();

    return view("purchase.ffo.list", compact('purchase_ffo'));
}

function ffoadd(){
    return view("purchase.ffo.add");
}

function ffostore(Request $request){

    $validated = $request->validate([
        'ffodate' => 'required',
        'scstno' => 'required',
        'scstamount' => 'required',
        'othersno' => 'required',
        'othersamount' => 'required'
    ]);

    $totalno = $request->scstno + $request->othersno;
    $totalamount = $request->scstamount + $request->othersamount;
    $ffo = new Purchase_ffo;
    $ffo->user_id = Auth::user()->id;
    $ffo->issuedate = $request->issuedate;
    $ffo->qty = $request->qty;
    $ffo->amount = $request->amount;
    $ffo->totalamount = $totalamount;
    $ffo->save();


    return redirect('/society/purchase/ffo/add')->with('status', 'ffo added successfully');
   // return view("issue");
}

//purchase_pdbunk
function pdbunklist(){

    $purchase_pdbunk = Purchase_pdbunk::where('user_id', Auth::user()->id)->get();

    return view("purchase.pdbunk.list", compact('purchase_pdbunk'));
}

function pdbunkadd(){
    return view("purchase.pdbunk.add");
}

function pdbunkstore(Request $request){

    $validated = $request->validate([
        'pdbunkdate' => 'required',
        'scstno' => 'required',
        'scstamount' => 'required',
        'othersno' => 'required',
        'othersamount' => 'required'
    ]);

    $totalno = $request->scstno + $request->othersno;
    $totalamount = $request->scstamount + $request->othersamount;
    $pdbunk = new Purchase_pdbunk;
    $pdbunk->user_id = Auth::user()->id;
    $pdbunk->issuedate = $request->issuedate;
    $pdbunk->qty = $request->qty;
    $pdbunk->amount = $request->amount;
    $pdbunk->totalamount = $totalamount;
    $pdbunk->save();


    return redirect('/society/purchase/pdbunk/add')->with('status', 'pdbunk added successfully');
   // return view("issue");
}

//purchase_Non controlled commodities
function ncclist(){

    $purchase_ncc =Purchase_ncc::where('user_id', Auth::user()->id)->get();

    return view("purchase.ncc.list", compact('purchase_ncc'));
}

function nccadd(){
    return view("purchase.ncc.add");
}

function nccstore(Request $request){

    $validated = $request->validate([
        'nccdate' => 'required',
        'scstno' => 'required',
        'scstamount' => 'required',
        'othersno' => 'required',
        'othersamount' => 'required'
    ]);

    $totalno = $request->scstno + $request->othersno;
    $totalamount = $request->scstamount + $request->othersamount;
    $ncc = new Purchase_ncc;
    $ncc->user_id = Auth::user()->id;
    $ncc->issuedate = $request->issuedate;
    $ncc->qty = $request->qty;
    $ncc->amount = $request->amount;
    $ncc->totalamount = $totalamount;
    $ncc->save();


    return redirect('/society/purchase/ncc/add')->with('status', 'Non controlled commodities added successfully');
   // return view("issue");
}

//Sales Fertilizer

    function Fertilizerlist(){

        $sales_Fertilizer = Sales_Fertilizer::where('user_id', Auth::user()->id)->get();

        return view("sales.fertilizer.list", compact('sales_Fertilizer'));
    }

    function Fertilizeradd(){
        return view("sales.fertilizer.add");
    }

    function Fertilizerstore(Request $request){

               $validated = $request->validate([
            'issuedate' => 'required',
            'loantype' => 'required',
            'scstno' => 'required|numeric',
            'scstamount' => 'required|numeric',
            'othersno' => 'required|numeric',
            'othersamount' => 'required|numeric'
        ],
        [
             'issuedate.required' => 'The Issue date field can not be blank value.',
             'loantype.required' => 'The Loan type field can not be blank value.',
             'scstno.required' => 'The SC / ST No. field can not be blank value.',
             'scstamount.required' => 'The SC / ST Amount field can not be blank value.',
             'othersno.required' => 'The Others Amount field can not be blank value.',
             'othersamount.required' => 'The Others No field can not be blank value.',
             'scstno.numeric' => 'The SC / ST No. field can must be numeric.',
             'scstamount.numeric' => 'The SC / ST Amount field must be numeric.',
             'othersno.numeric' => 'The Others No field must be numeric.',
             'othersamount.numeric' => 'TheOthers Amount field must be numeric.',
        ]);


       $totalamount = $request->totalamount;
        $Fertilizer = new sales_Fertilizer;
        $Fertilizer->user_id = Auth::user()->id;
        $Fertilizer->issuedate = $request->issuedate;
        $Fertilizer->nosveriety = $request->nosveriety;
        $Fertilizer->nosfarmer = $request->nosfarmer;
        $Fertilizer->qty = $request->qty;
        $Fertilizer->totalamount = $totalamount;
        $Fertilizer->save();


        return redirect('/society/purchase/Fertilizer/add')->with('status', 'Fertilizer added successfully');
       // return view("issue");
    }

         //sales_pharmacy

         function Pharmacyslist(){

            $sales_Pharmacy = Sales_pharmacy::where('user_id', Auth::user()->id)->get();

            return view("sales.pharmacy.list", compact('sales_Pharmacy'));
        }

        function Pharmacysadd(){
            return view("sales.pharmacy.add");
        }

        function pharmacysstore(Request $request){

            $validated = $request->validate([
                'pharmacydate' => 'required',
                'scstno' => 'required',
                'scstamount' => 'required',
                'othersno' => 'required',
                'othersamount' => 'required'
            ]);

            $totalno = $request->scstno + $request->othersno;
            $totalamount = $request->scstamount + $request->othersamount;
            $pharmacy = new sales_Pharmacy;
            $pharmacy->user_id = Auth::user()->id;
            $pharmacy->issuedate = $request->issuedate;
            $pharmacy->qty = $request->qty;
            $pharmacy->amount = $request->amount;
            $pharmacy->totalamount = $totalamount;
            $pharmacy->save();


            return redirect('/society/sales/pharmacy/add')->with('status', 'pharmacy added successfully');
           // return view("issue");
        }
//sales_ffo
function ffoslist(){

    $sales_ffo = sales_ffo::where('user_id', Auth::user()->id)->get();

    return view("sales.ffo.list", compact('sales_ffo'));
}

function ffosadd(){
    return view("sales.ffo.add");
}

function ffosstore(Request $request){

    $validated = $request->validate([
        'ffodate' => 'required',
        'scstno' => 'required',
        'scstamount' => 'required',
        'othersno' => 'required',
        'othersamount' => 'required'
    ]);

    $totalno = $request->scstno + $request->othersno;
    $totalamount = $request->scstamount + $request->othersamount;
    $ffo = new sales_ffo;
    $ffo->user_id = Auth::user()->id;
    $ffo->issuedate = $request->issuedate;
    $ffo->qty = $request->qty;
    $ffo->amount = $request->amount;
    $ffo->totalamount = $totalamount;
    $ffo->save();


    return redirect('/society/sales/ffo/add')->with('status', 'ffo added successfully');
   // return view("issue");
}

//sales_pdbunk
function pdbunkslist(){

    $sales_pdbunk = sales_pdbunk::where('user_id', Auth::user()->id)->get();

    return view("sales.pdbunk.list", compact('sales_pdbunk'));
}

function pdbunksadd(){
    return view("sales.pdbunk.add");
}

function pdbunksstore(Request $request){

    $validated = $request->validate([
        'pdbunkdate' => 'required',
        'scstno' => 'required',
        'scstamount' => 'required',
        'othersno' => 'required',
        'othersamount' => 'required'
    ]);

    $totalno = $request->scstno + $request->othersno;
    $totalamount = $request->scstamount + $request->othersamount;
    $pdbunk = new sales_pdbunk;
    $pdbunk->user_id = Auth::user()->id;
    $pdbunk->issuedate = $request->issuedate;
    $pdbunk->qty = $request->qty;
    $pdbunk->amount = $request->amount;
    $pdbunk->totalamount = $totalamount;
    $pdbunk->save();


    return redirect('/society/sales/pdbunk/add')->with('status', 'pdbunk added successfully');
   // return view("issue");
}

//sales_Non controlled commodities
function nccslist(){

    $sales_ncc =sales_ncc::where('user_id', Auth::user()->id)->get();

    return view("sales.ncc.list", compact('sales_ncc'));
}

function nccsadd(){
    return view("sales.ncc.add");
}

function nccsstore(Request $request){

    $validated = $request->validate([
        'nccdate' => 'required',
        'scstno' => 'required',
        'scstamount' => 'required',
        'othersno' => 'required',
        'othersamount' => 'required'
    ]);

    $totalno = $request->scstno + $request->othersno;
    $totalamount = $request->scstamount + $request->othersamount;
    $ncc = new sales_ncc;
    $ncc->user_id = Auth::user()->id;
    $ncc->issuedate = $request->issuedate;
    $ncc->qty = $request->qty;
    $ncc->amount = $request->amount;
    $ncc->totalamount = $totalamount;
    $ncc->save();


    return redirect('/society/sales/ncc/add')->with('status', 'Non controlled commodities added successfully');
   // return view("issue");
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

    function fdgovtlist()
    {

        $deposit_fdgovts = Deposit_fdgovts::where('user_id', Auth::user()->id)->get();

        return view("deposit.fdgovt.list", compact('deposit_fdgovts'));
    }

    function fdgovtadd()
    {
        return view("deposit.fdgovt.add");
    }

    function fdgovtstore(Request $request)
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
        $fdgovts = new Deposit_fdgovts;
        $fdgovts->user_id = Auth::user()->id;
        $fdgovts->recieveddate = $request->recieveddate;
        $fdgovts->recievedothersno = $request->recievedothersno;
        $fdgovts->recievedothersamount = $request->recievedothersamount;
        $fdgovts->recievedtotalno = $recievedtotalno;
        $fdgovts->recivedtotalamount = $recievedtotalamount;
        $fdgovts->closeddate = $request->closeddate;
        $fdgovts->closedothersno = $request->closedothersno;
        $fdgovts->closeddothersamount = $request->closeddothersamount;
        $fdgovts->closedtotalno = $closedtotalno;
        $fdgovts->closedtotalamount = $closedtotalamount;
        $fdgovts->save();

        return redirect('/society/deposit/fdgovt/add')->with('status', 'FD Government Deposit added successfully');
    }
    function fdindlist()
    {

        $deposit_fdinds = Deposit_fdinds::where('user_id', Auth::user()->id)->get();

        return view("deposit.fdind.list", compact('deposit_fdinds'));
    }

    function fdindadd()
    {
        return view("deposit.fdind.add");
    }

    function fdindstore(Request $request)
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
        $fdinds = new Deposit_fdinds;
        $fdinds->user_id = Auth::user()->id;
        $fdinds->recieveddate = $request->recieveddate;
        $fdinds->recievedothersno = $request->recievedothersno;
        $fdinds->recievedothersamount = $request->recievedothersamount;
        $fdinds->recievedtotalno = $recievedtotalno;
        $fdinds->recivedtotalamount = $recievedtotalamount;
        $fdinds->closeddate = $request->closeddate;
        $fdinds->closedothersno = $request->closedothersno;
        $fdinds->closeddothersamount = $request->closeddothersamount;
        $fdinds->closedtotalno = $closedtotalno;
        $fdinds->closedtotalamount = $closedtotalamount;
        $fdinds->save();

        return redirect('/society/deposit/fdind/add')->with('status', 'FD Individuals Deposit added successfully');
    }

    function fdistlist()
    {

        $deposit_fdists = Deposit_fdists::where('user_id', Auth::user()->id)->get();
        return view("deposit.fdist.list", compact('deposit_fdists'));
    }

    function fdistadd()
    {
        return view("deposit.fdist.add");
    }

    function fdiststore(Request $request)
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
        $fdists = new Deposit_fdists;
        $fdists->user_id = Auth::user()->id;
        $fdists->recieveddate = $request->recieveddate;
        $fdists->recievedothersno = $request->recievedothersno;
        $fdists->recievedothersamount = $request->recievedothersamount;
        $fdists->recievedtotalno = $recievedtotalno;
        $fdists->recivedtotalamount = $recievedtotalamount;
        $fdists->closeddate = $request->closeddate;
        $fdists->closedothersno = $request->closedothersno;
        $fdists->closeddothersamount = $request->closeddothersamount;
        $fdists->closedtotalno = $closedtotalno;
        $fdists->closedtotalamount = $closedtotalamount;
        $fdists->save();

        return redirect('/society/deposit/fdist/add')->with('status', 'FD Institution Deposit added successfully');
    }


    function rdlist()
    {

        $deposit_rds = Deposit_rds::where('user_id', Auth::user()->id)->get();
        return view("deposit.rd.list", compact('deposit_rds'));
    }

    function rdadd()
    {
        return view("deposit.rd.add");
    }

    function rdstore(Request $request)
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
        $rds = new Deposit_rds;
        $rds->user_id = Auth::user()->id;
        $rds->recieveddate = $request->recieveddate;
        $rds->recievedothersno = $request->recievedothersno;
        $rds->recievedothersamount = $request->recievedothersamount;
        $rds->recievedtotalno = $recievedtotalno;
        $rds->recivedtotalamount = $recievedtotalamount;
        $rds->closeddate = $request->closeddate;
        $rds->closedothersno = $request->closedothersno;
        $rds->closeddothersamount = $request->closeddothersamount;
        $rds->closedtotalno = $closedtotalno;
        $rds->closedtotalamount = $closedtotalamount;
        $rds->save();

        return redirect('/society/deposit/rd/add')->with('status', 'RD Deposit added successfully');
    }

    function sblist()
    {

        $deposit_sbs = Deposit_sbs::where('user_id', Auth::user()->id)->get();
        return view("deposit.sb.list", compact('deposit_sbs'));
    }

    function sbadd()
    {
        return view("deposit.sb.add");
    }

    function sbstore(Request $request)
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
        $sbs = new Deposit_sbs;
        $sbs->user_id = Auth::user()->id;
        $sbs->recieveddate = $request->recieveddate;
        $sbs->recievedothersno = $request->recievedothersno;
        $sbs->recievedothersamount = $request->recievedothersamount;
        $sbs->recievedtotalno = $recievedtotalno;
        $sbs->recivedtotalamount = $recievedtotalamount;
        $sbs->closeddate = $request->closeddate;
        $sbs->closedothersno = $request->closedothersno;
        $sbs->closeddothersamount = $request->closeddothersamount;
        $sbs->closedtotalno = $closedtotalno;
        $sbs->closedtotalamount = $closedtotalamount;
        $sbs->save();

        return redirect('/society/deposit/sb/add')->with('status', 'RD Deposit added successfully');
    }

    function currentlist()
    {

        $deposit_currents = Deposit_currents::where('user_id', Auth::user()->id)->get();
        return view("deposit.current.list", compact('deposit_currents'));
    }

    function currentadd()
    {
        return view("deposit.current.add");
    }

    function currentstore(Request $request)
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
        $currents = new Deposit_currents;
        $currents->user_id = Auth::user()->id;
        $currents->recieveddate = $request->recieveddate;
        $currents->recievedothersno = $request->recievedothersno;
        $currents->recievedothersamount = $request->recievedothersamount;
        $currents->recievedtotalno = $recievedtotalno;
        $currents->recivedtotalamount = $recievedtotalamount;
        $currents->closeddate = $request->closeddate;
        $currents->closedothersno = $request->closedothersno;
        $currents->closeddothersamount = $request->closeddothersamount;
        $currents->closedtotalno = $closedtotalno;
        $currents->closedtotalamount = $closedtotalamount;
        $currents->save();

        return redirect('/society/current/rd/add')->with('status', 'Current Account Deposit added successfully');
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

        $validated = $request->validate([
            'count' => 'required',
            'capacity' => 'required',
            'utilized' => 'required',
            'pecentageutilized' => 'required',
            'income' => 'required',
        ]);


        $godowns = new Godowns;
        $godowns->user_id = Auth::user()->id;
        $godowns->count = $request->count;
        $godowns->capacity = $request->capacity;
        $godowns->utilized = $request->utilized;
        $godowns->pecentageutilized = $request->pecentageutilized;
        $godowns->income = $request->income;
        $godowns->save();

        return redirect('/society/godown/add')->with('status', 'RD Deposit added successfully');
    }

    function csclist()
    {

        $services_cscs = Services_cscs::where('user_id', Auth::user()->id)->get();
        return view("services.csc.list", compact('services_cscs'));
    }

    function cscadd()
    {
        return view("services.csc.add");
    }

    function cscstore(Request $request)
    {

        $validated = $request->validate([
            'count' => 'required',
            'income' => 'required',
        ]);


        $cscs = new Services_cscs;
        $cscs->user_id = Auth::user()->id;
        $cscs->count = $request->count;
        $cscs->income = $request->income;
        $cscs->save();

        return redirect('/services/csc/add')->with('status', 'Commom Services Centres added successfully');
    }

    function agrilist()
    {

        $services_agris = Services_agris::where('user_id', Auth::user()->id)->get();
        return view("services.agri.list", compact('services_agris'));
    }

    function agrisadd()
    {
        return view("services.agri.add");
    }

    function agristore(Request $request)
    {

        $validated = $request->validate([
            'count' => 'required',
            'income' => 'required',
        ]);


        $agris = new Services_agris;
        $agris->user_id = Auth::user()->id;
        $agris->count = $request->count;
        $agris->income = $request->income;
        $agris->save();

        return redirect('/services/agri/add')->with('status', 'Agri Implement Centres added successfully');
    }



    function lodginglist()
    {

        $services_lodgings = Services_lodgings::where('user_id', Auth::user()->id)->get();
        return view("services.lodging.list", compact('services_lodgings'));
    }

    function lodgingadd()
    {
        return view("services.lodging.add");
    }

    function lodgingstore(Request $request)
    {

        $validated = $request->validate([
            'no_of_customers' => 'required',
            'sales_physical' => 'required',
        ]);


        $lodgings = new Services_lodgings;
        $lodgings->user_id = Auth::user()->id;
        $lodgings->no_of_customers = $request->no_of_customers;
        $lodgings->sales_physical = $request->sales_physical;
        $lodgings->save();

        return redirect('/services/lodging/add')->with('status', 'Lodging added successfully');
    }

    function drylist()
    {

        $services_drys = Services_drys::where('user_id', Auth::user()->id)->get();
        return view("services.dry.list", compact('services_drys'));
    }

    function dryadd()
    {
        return view("services.dry.add");
    }

    function drystore(Request $request)
    {

        $validated = $request->validate([
            'no_of_farmers' => 'required',
            'income' => 'required',
        ]);


        $drys = new Services_drys;
        $drys->user_id = Auth::user()->id;
        $drys->no_of_farmers = $request->no_of_farmers;
        $drys->income = $request->income;
        $drys->save();

        return redirect('/services/dry/add')->with('status', 'Lodging added successfully');
    }

    function pslist()
    {

        $services_pss = Services_pss::where('user_id', Auth::user()->id)->get();
        return view("services.ps.list", compact('services_pss'));
    }

    function psadd()
    {
        return view("services.ps.add");
    }

    function psstore(Request $request)
    {

        $validated = $request->validate([
            'no_of_varieties' => 'required',
            'no_of_farmers' => 'required',
            'qualitymt' => 'required',
            'qualitylts' => 'required',
            'sales_physical' => 'required',
        ]);


        $pss = new Services_pss;
        $pss->user_id = Auth::user()->id;
        $pss->no_of_varieties = $request->no_of_varieties;
        $pss->no_of_farmers = $request->no_of_farmers;
        $pss->qualitymt = $request->qualitymt;
        $pss->qualitylts = $request->qualitylts;
        $pss->sales_physical = $request->sales_physical;
        $pss->save();

        return redirect('/services/ps/add')->with('status', 'Providing seeds added successfully');
    }

    function psslist()
    {

        $services_psss = Services_pss::where('user_id', Auth::user()->id)->get();
        return view("services.pss.list", compact('services_psss'));
    }

    function pssadd()
    {
        return view("services.pss.add");
    }

    function pssstore(Request $request)
    {

        $validated = $request->validate([
            'no_of_centres' => 'required',
            'no_of_farmers' => 'required',
            'qualitymt' => 'required',
            'qualitylts' => 'required',
            'sales' => 'required',
        ]);


        $psss = new Services_psss;
        $psss->user_id = Auth::user()->id;
        $psss->no_of_centres = $request->no_of_centres;
        $psss->no_of_farmers = $request->no_of_farmers;
        $psss->qualitymt = $request->qualitymt;
        $psss->qualitylts = $request->qualitylts;
        $psss->sales = $request->sales;
        $psss->save();

        return redirect('/services/pss/add')->with('status', 'Providing seeds added successfully');
    }



}
