<?php

namespace App\Http\Controllers;

use App\Models\Deposit_fdgovts;
use App\Models\Deposit_fdinds;
use App\Models\Deposit_outstanding;
use App\Models\Deposit_outstandings;
use App\Models\Fdgovt;
use Hash;
use Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Loan_issues;

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

    function issuelist()
    {

        $loan_issues = Loan_issues::where('user_id', Auth::user()->id)->get();

        return view("loan.issue.list", compact('loan_issues'));
    }

    function issueadd()
    {
        return view("loan.issue.add");
    }

    function issuestore(Request $request)
    {

        $validated = $request->validate([
            'issuedate' => 'required',
            'scstno' => 'required',
            'scstamount' => 'required',
            'othersno' => 'required',
            'othersamount' => 'required'
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
            'recievedothersamount' => 'required'
        ]);

        $recievedtotalno = $request->scstno + $request->recievedothersno;
        $recievedtotalamount = $request->scstamount + $request->recievedothersamount;
        $closedtotalno = $request->scstno + $request->closedothersno;
        $closedtotalamount = $request->scstamount + $request->closedothersamount;
        $outstandings = new Loan_issues;
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
            'recievedothersamount' => 'required'
        ]);

        $recievedtotalno = $request->scstno + $request->recievedothersno;
        $recievedtotalamount = $request->scstamount + $request->recievedothersamount;
        $closedtotalno = $request->scstno + $request->closedothersno;
        $closedtotalamount = $request->scstamount + $request->closedothersamount;
        $fdgovts = new Loan_issues;
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
            'recievedothersamount' => 'required'
        ]);

        $recievedtotalno = $request->scstno + $request->recievedothersno;
        $recievedtotalamount = $request->scstamount + $request->recievedothersamount;
        $closedtotalno = $request->scstno + $request->closedothersno;
        $closedtotalamount = $request->scstamount + $request->closedothersamount;
        $fdinds = new Loan_issues;
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

        return redirect('/society/deposit/fdind/add')->with('status', 'FD Government Deposit added successfully');
    }
}
