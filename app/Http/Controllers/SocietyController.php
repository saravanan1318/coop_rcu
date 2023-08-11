<?php

namespace App\Http\Controllers;

use App\Models\Loan_annual;
use App\Models\Loan_overallot;
use App\Models\Loan_collection;
use App\Models\purchase_Fertilizer;
use App\Models\Purchase_ffo;
use App\Models\Purchase_pharmacy;
use Hash;
use Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Loan_issues;
use App\Models\Mtr_loan;

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


        $totalno = $request->scstno + $request->othersno;
        $totalamount = $request->scstamount + $request->othersamount;
        $issues = new Loan_issues;
        $issues->user_id = Auth::user()->id;
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
            'loantype' => 'required',
            'scstno' => 'required|numeric',
            'scstamount' => 'required|numeric',
            'othersno' => 'required|numeric',
            'othersamount' => 'required|numeric'
        ],
        [
             'collectiondate.required' => 'The Collection date field can not be blank value.',
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

        $totalno = $request->scstno + $request->othersno;
        $totalamount = $request->scstamount + $request->othersamount;
        $collection = new Loan_collection;
        $collection->user_id = Auth::user()->id;
        $collection->loantype = $request->loantype;
        $collection->collectiondate = $request->collectiondate;
        $collection->scstno = $request->scstno;
        $collection->scstamount = $request->scstamount;
        $collection->othersno = $request->othersno;
        $collection->othersamount = $request->othersamount;
        $collection->totalno = $totalno;
        $collection->totalamount = $totalamount;
        $collection->save();


        return redirect('/society/loan/collection/add')->with('status', 'Loan collection added successfully');
       // return view("issue");
    }

        //Annual targer Form

        function annuallist(){

            $loan_annual = Loan_annual::where('user_id', Auth::user()->id)->get();

            return view("loan.annual.list", compact('loan_annual'));
        }

        function annualadd(){
            return view("loan.annual.add");
        }

        function annualstore(Request $request){

            $validated = $request->validate([
                'issuedate' => 'required',
                'scstno' => 'required',
                'scstamount' => 'required',
                'othersno' => 'required',
                'othersamount' => 'required'
            ]);

            $totalno = $request->scstno + $request->othersno;
            $totalamount = $request->scstamount + $request->othersamount;
            $annual = new Loan_annual;
            $annual->user_id = Auth::user()->id;
            $annual->issuedate = $request->issuedate;
            $annual->scstno = $request->scstno;
            $annual->scstamount = $request->scstamount;
            $annual->othersno = $request->othersno;
            $annual->othersamount = $request->othersamount;
            $annual->totalno = $totalno;
            $annual->totalamount = $totalamount;
            $annual->save();


            return redirect('/society/loan/annual/add')->with('status', 'Loan issue added successfully');
           // return view("issue");
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
           // return view("issue");
        }

         //purchase_Fertilizer
    function Fertilizerlist(){

        $purchase_Fertilizer = purchase_Fertilizer::where('user_id', Auth::user()->id)->get();

        return view("purchase.fertilizer.list", compact('purchase_Fertilizer'));
    }

    function Fertilizeradd(){
        return view("purchase.fertilizer.add");
    }

    function Fertilizerstore(Request $request){

        $validated = $request->validate([
            'Fertilizerdate' => 'required',
            'scstno' => 'required',
            'scstamount' => 'required',
            'othersno' => 'required',
            'othersamount' => 'required'
        ]);

        $totalno = $request->scstno + $request->othersno;
        $totalamount = $request->scstamount + $request->othersamount;
        $Fertilizer = new Purchase_Fertilizer;
        $Fertilizer->user_id = Auth::user()->id;
        $Fertilizer->issuedate = $request->issuedate;
        $Fertilizer->scstno = $request->scstno;
        $Fertilizer->scstamount = $request->scstamount;
        $Fertilizer->othersno = $request->othersno;
        $Fertilizer->othersamount = $request->othersamount;
        $Fertilizer->totalno = $totalno;
        $Fertilizer->totalamount = $totalamount;
        $Fertilizer->save();


        return redirect('/society/purchase/Fertilizer/add')->with('status', 'Fertilizer added successfully');
       // return view("issue");
    }

         //purchase_pharmacy
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

function fforadd(){
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



}
