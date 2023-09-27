<?php

namespace App\Http\Controllers;

use App\Helpers\LoanQueryService;
use App\Models\Mtr_services;
use App\Models\Mtr_societytype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Excel;

use App\Models\Loan;
use App\Models\Loan_overallot;
use App\Models\Mtr_loan;
use App\Models\Loan_onetimeentry;
use App\Models\Deposit_onetimeentry;
use App\Models\Mtr_deposits;
use App\Models\Deposits;
use App\Models\Purchases;
use App\Models\Sales;
use App\Models\Mtr_region;
use App\Models\Mtr_circle;
use App\Models\Mtr_society;
use App\Models\Mtr_role;
use App\Models\User;

use App\Models\Godowns;

use App\Exports\LoanExport;
use App\Models\Croploan_entry;
use App\Models\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SuperAdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role == 2) {
                return $next($request);
            }
            abort(403);
        });
    }

    function dashboard()
    {
        return view("superadmin.dashboard");
    }

    function loanreportold(Request $request)
    {


        $loanreportdate = $request->loanreportdate;

        if (!empty($loanreportdate)) {
            $loanreportdate = $request->loanreportdate;
        } else {
            $loanreportdate = date("Y-m-d");
        }

        $mtr_loans = Mtr_loan::all();


        $finalarr = array();

        foreach ($mtr_loans as $mtr_loan) {


            $loan_onetimeentry = Loan_onetimeentry::where('loan_id', $mtr_loan->id)->first();

            $issuedtotal = DB::table('loan_issues')->select(DB::raw('SUM(totalamount) as totalamount'), DB::raw('SUM(totalno) as totalno'), DB::raw('SUM(scstno) as scstno'), DB::raw('SUM(scstamount) as scstamount'))->where('loan_id', $mtr_loan->id)->where('issuedate', $loanreportdate)->get();
            $collectedtotal = DB::table('loan_collection')->select(DB::raw('SUM(totalamount) as totalamount'), DB::raw('SUM(totalno) as totalno'))->where('loan_id', $mtr_loan->id)->where('collectiondate', $loanreportdate)->get();

            $overalloutstandissued = Loan_issues::where('loan_id', $mtr_loan->id)->sum('totalamount');
            $currentoveralloutstandissued = Loan_issues::where('loan_id', $mtr_loan->id)->where('issuedate', '>=', date("Y-m-01"))->sum('totalamount');

            $overalloutstandcollected = Loan_collection::where('loan_id', $mtr_loan->id)->sum('totalamount');
            $currentoveralloutstandcollected = Loan_collection::where('loan_id', $mtr_loan->id)->where('collectiondate', '>=', date("Y-m-01"))->sum('totalamount');


            $overall_outstanding =  0;
            $current_outstanding =  0;
            $current_year =  0;
            $annual_target =  0;
            $annual_targetcalc =  1;

            if (!is_null($loan_onetimeentry)) {

                $overall_outstanding =  $loan_onetimeentry->overall_outstanding;
                $current_outstanding =  $loan_onetimeentry->current_outstanding;
                $current_year =  $loan_onetimeentry->current_year;
                $annual_target =  $loan_onetimeentry->annual_target;
                $annual_targetcalc =  $loan_onetimeentry->annual_target;
            }

            $overalloutstandissued = $overall_outstanding +  $overalloutstandissued - $overalloutstandcollected;
            $currentoveralloutstandissued =  $current_outstanding +  $currentoveralloutstandissued - $currentoveralloutstandcollected;

            $totalno = $issuedtotal[0]->totalno;
            $totalamount = $issuedtotal[0]->totalamount;
            $scstno = $issuedtotal[0]->scstno;
            $scstamount = $issuedtotal[0]->scstamount;

            $collectiontotalno = $collectedtotal[0]->totalno;
            $collectiontotalamount = $collectedtotal[0]->totalamount;

            $achievedpercentage = ($totalamount / $annual_targetcalc) * 100;

            $indarr = array();

            $indarr['date'] =  date("d-m-Y", strtotime($loanreportdate));;
            $indarr['loantype'] = $mtr_loan->loantype;
            $indarr['overall_outstanding'] = $this->IND_money_format($overalloutstandissued);
            $indarr['current_outstanding'] = $this->IND_money_format($currentoveralloutstandissued);
            $indarr['current_year'] = $current_year;
            $indarr['annual_target'] = $this->IND_money_format($annual_target);
            $indarr['totalno'] = is_null($totalno) ? 0 : $totalno;
            $indarr['totalamount'] = is_null($totalamount) ? 0 : $this->IND_money_format($totalamount);
            $indarr['scstissuedtotalno'] = is_null($scstno) ? 0 : $scstno;
            $indarr['scstissuedtotalamount'] = is_null($scstamount) ? 0 : $this->IND_money_format($scstamount);
            $indarr['collectedtotalno'] = is_null($collectiontotalno) ? 0 : $collectiontotalno;
            $indarr['collectedtotalamount'] = is_null($collectiontotalamount) ? 0 : $this->IND_money_format($collectiontotalamount);
            $indarr['achieved'] = number_format((float)$achievedpercentage, 2, '.', '');

            array_push($finalarr, $indarr);
        }


        return view("superadmin.loanreport", compact('finalarr', 'loanreportdate'));
    }

    function loanreport(Request $request)
    {

        $loanreportdate = $request->loanreportdate;

        if (!empty($loanreportdate)) {
            $loanreportdate = $request->loanreportdate;
        } else {
            $loanreportdate = date("Y-m-d");
        }

//        $loans = Loan::where('loandate', $loanreportdate)->paginate(5);
        $societiestypes = Mtr_societytype::all();
        $societyTypesFilter=$request->input('societyTypes');
        if(!empty($societyTypesFilter)) {
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(loan_onetimeentry.annual_target), 0)
                FROM loan_onetimeentry
                WHERE loan_onetimeentry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS Loan_Target_2023_24'),
                    DB::raw('(SELECT IFNULL(SUM(loan.disbursedamount), 0)
                FROM loan
                WHERE loan.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS Disbursed_Amount'),
                    DB::raw('CONCAT(
                    ROUND(
                        IFNULL(
                            (SELECT SUM(loan.disbursedamount)
                             FROM loan
                             WHERE loan.user_id IN (
                                 SELECT users.id
                                 FROM users
                                 WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                             )), 0
                        ) /
                        IFNULL(
                            (SELECT SUM(loan_onetimeentry.annual_target)
                             FROM loan_onetimeentry
                             WHERE loan_onetimeentry.user_id IN (
                                 SELECT users.id
                                 FROM users
                                 WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                             )), 0
                        ) * 100, 2
                    ),
                    "%"
                ) AS Percent_of_Loan')
                )
                ->get();
        }
        else{
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(loan_onetimeentry.annual_target), 0)
                FROM loan_onetimeentry
                WHERE loan_onetimeentry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS Loan_Target_2023_24'),
                    DB::raw('(SELECT IFNULL(SUM(loan.disbursedamount), 0)
                FROM loan
                WHERE loan.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS Disbursed_Amount'),
                    DB::raw('CONCAT(
                    ROUND(
                        IFNULL(
                            (SELECT SUM(loan.disbursedamount)
                             FROM loan
                             WHERE loan.user_id IN (
                                 SELECT users.id
                                 FROM users
                                 WHERE users.region_id = a.id
                             )), 0
                        ) /
                        IFNULL(
                            (SELECT SUM(loan_onetimeentry.annual_target)
                             FROM loan_onetimeentry
                             WHERE loan_onetimeentry.user_id IN (
                                 SELECT users.id
                                 FROM users
                                 WHERE users.region_id = a.id
                             )), 0
                        ) * 100, 2
                    ),
                    "%"
                ) AS Percent_of_Loan')
                )
                ->get();
        }

        $loans = Loan::select("*")->get();



//        $results = DB::select('SELECT * FROM view_regionwise_credit_and_deopsit');

        return view("superadmin.loanreport", compact('loans', 'loanreportdate','results','societiestypes','societyTypesFilter'));
    }

    function depositreportold(Request $request)
    {


        $depositreportdate = $request->depositreportdate;

        if (!empty($depositreportdate)) {
            $depositreportdate = $request->depositreportdate;
        } else {
            $depositreportdate = date("Y-m-d");
        }

        $mtr_deposits = Mtr_deposits::all();


        $finalarr = array();

        foreach ($mtr_deposits as $mtr_deposit) {


            $deposit_onetimeentry = Deposit_onetimeentry::where('deposit_id', $mtr_deposit->id)->first();

            $receivedtotal = DB::table('deposits')->select(DB::raw('SUM(recievedno) as recievedno'), DB::raw('SUM(recievedamount) as recievedamount'), DB::raw('SUM(closedno) as closedno'), DB::raw('SUM(closedamount) as closedamount'))->where('deposit_id', $mtr_deposit->id)->where('depositdate', $depositreportdate)->get();

            $overalloutstandreceived = Deposits::where('deposit_id', $mtr_deposit->id)->sum('recievedamount');
            $currentoveralloutstandreceived = Deposits::where('deposit_id', $mtr_deposit->id)->where('depositdate', '>=', date("Y-m-01"))->sum('recievedamount');

            $overalloutstandclosed = Deposits::where('deposit_id', $mtr_deposit->id)->sum('closedamount');
            $currentoveralloutstandclosed = Deposits::where('deposit_id', $mtr_deposit->id)->where('depositdate', '>=', date("Y-m-01"))->sum('closedamount');


            $overall_outstanding =  0;
            $current_outstanding =  0;
            $current_year =  0;
            $annual_target =  0;
            $annual_targetcalc =  1;

            if (!is_null($deposit_onetimeentry)) {

                $overall_outstanding =  $deposit_onetimeentry->overall_outstanding;
                $current_outstanding =  $deposit_onetimeentry->current_outstanding;
                $current_year =  $deposit_onetimeentry->current_year;
                $annual_target =  $deposit_onetimeentry->annual_target;
                $annual_targetcalc =  $deposit_onetimeentry->annual_target;
            }

            $overalloutstandreceived = $overall_outstanding +  $overalloutstandreceived - $overalloutstandclosed;
            $currentoveralloutstandreceived =  $current_outstanding +  $currentoveralloutstandreceived - $currentoveralloutstandclosed;

            $receivedno = $receivedtotal[0]->recievedno;
            $receivedamount = $receivedtotal[0]->recievedamount;
            $closedno = $receivedtotal[0]->closedno;
            $closedamount = $receivedtotal[0]->closedamount;

            $achievedpercentage = ($receivedamount / $annual_targetcalc) * 100;

            $indarr = array();

            $indarr['date'] =  date("d-m-Y", strtotime($depositreportdate));;
            $indarr['loantype'] = $mtr_deposit->deposit_name;
            $indarr['overall_outstanding'] = $this->IND_money_format($overalloutstandreceived);
            $indarr['current_outstanding'] = $this->IND_money_format($currentoveralloutstandreceived);
            $indarr['current_year'] = $current_year;
            $indarr['annual_target'] = $this->IND_money_format($annual_target);
            $indarr['receivedno'] = is_null($receivedno) ? 0 : $receivedno;
            $indarr['receivedamount'] = is_null($receivedamount) ? 0 : $this->IND_money_format($receivedamount);
            $indarr['closedno'] = is_null($closedno) ? 0 : $closedno;
            $indarr['closedamount'] = is_null($closedamount) ? 0 : $this->IND_money_format($closedamount);
            $indarr['achieved'] = number_format((float)$achievedpercentage, 2, '.', '');

            array_push($finalarr, $indarr);
        }


        return view("superadmin.depositreport", compact('finalarr', 'depositreportdate'));
    }

    function depositreport(Request $request)
    {


        $societiestypes = Mtr_societytype::all();
        $societyTypesFilter=$request->input('societyTypes');
        if(!empty($societyTypesFilter)) {
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(deposit_onetimeentry.annual_target), 0)
                FROM deposit_onetimeentry
                WHERE deposit_onetimeentry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS Deposit_Target_2023_24'),
                    DB::raw('(SELECT ROUND(IFNULL(SUM(deposits.recievedamount), 0))
                FROM deposits
                WHERE deposits.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS Recieved_Amount'),
                    DB::raw('CONCAT(
                    ROUND(
                        (SELECT ROUND(IFNULL(SUM(deposits.recievedamount), 0))
                        FROM deposits
                        WHERE deposits.user_id IN (
                            SELECT users.id FROM users
                            WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                        )) / (SELECT IFNULL(SUM(deposit_onetimeentry.annual_target), 0)
                        FROM deposit_onetimeentry
                        WHERE deposit_onetimeentry.user_id IN (
                            SELECT users.id FROM users
                            WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                        )) * 100, 2),
                    "%") AS Percent_of_Deopsits_Achievements')
                )
                ->get();
        }
        else{
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(deposit_onetimeentry.annual_target), 0)
                FROM deposit_onetimeentry
                WHERE deposit_onetimeentry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS Deposit_Target_2023_24'),
                    DB::raw('(SELECT ROUND(IFNULL(SUM(deposits.recievedamount), 0))
                FROM deposits
                WHERE deposits.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS Recieved_Amount'),
                    DB::raw('CONCAT(
                    ROUND(
                        (SELECT ROUND(IFNULL(SUM(deposits.recievedamount), 0))
                        FROM deposits
                        WHERE deposits.user_id IN (
                            SELECT users.id FROM users
                            WHERE users.region_id = a.id
                        )) / (SELECT IFNULL(SUM(deposit_onetimeentry.annual_target), 0)
                        FROM deposit_onetimeentry
                        WHERE deposit_onetimeentry.user_id IN (
                            SELECT users.id FROM users
                            WHERE users.region_id = a.id
                        )) * 100, 2),
                    "%") AS Percent_of_Deopsits_Achievements')
                )
                ->get();
        }

        return view("superadmin.depositreport", compact('results','societiestypes','societyTypesFilter'));
    }

    function purchasereport(Request $request)
    {

//        $purchasereportdate = $request->purchasereportdate;
//
//        if (!empty($purchasereportdate)) {
//            $purchasereportdate = $request->purchasereportdate;
//        } else {
//            $purchasereportdate = date("Y-m-d");
//        }
//
//        $purchases = Purchases::where('purchasedate', $purchasereportdate)->paginate(5);
        $societiestypes = Mtr_societytype::all();
        $societyTypesFilter=$request->input('societyTypes');
        if(!empty($societyTypesFilter)) {
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(purchases.govtvalues), 0)
                FROM purchases
                WHERE purchases.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS Govt_institution'),
                    DB::raw('(SELECT IFNULL(SUM(purchases.coopvalues), 0)
                FROM purchases
                WHERE purchases.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS Coop'),
                    DB::raw('(SELECT IFNULL(SUM(purchases.jpcvalues), 0)
                FROM purchases
                WHERE purchases.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS jpc')
                )
                ->get();
        }
        else{
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(purchases.govtvalues), 0)
                FROM purchases
                WHERE purchases.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS Govt_institution'),
                    DB::raw('(SELECT IFNULL(SUM(purchases.coopvalues), 0)
                FROM purchases
                WHERE purchases.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS Coop'),
                    DB::raw('(SELECT IFNULL(SUM(purchases.jpcvalues), 0)
                FROM purchases
                WHERE purchases.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS jpc')
                )
                ->get();

        }
        return view("superadmin.purchasereport", compact('results','societiestypes','societyTypesFilter'));

//        return view("superadmin.purchasereport", compact('purchases', 'purchasereportdate'));
    }

    function salereport(Request $request)
    {

        /*$salereportdate = $request->salereportdate;

        if (!empty($salereportdate)) {
            $salereportdate = $request->salereportdate;
        } else {
            $salereportdate = date("Y-m-d");
        }

        $sales = Sales::where('saledate', $salereportdate)->paginate(5);*/
        $societiestypes = Mtr_societytype::all();
        $societyTypesFilter=$request->input('societyTypes');
        if(!empty($societyTypesFilter)) {
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(sales.noofvarieties), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS varieties'),
                    DB::raw('(SELECT IFNULL(SUM(sales.noofoutlets), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS outlets'),
                    DB::raw('(SELECT IFNULL(SUM(sales.noofcustomers), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS customers'),
                    DB::raw('(SELECT IFNULL(SUM(sales.nooffarmers), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS farmers'),
                    DB::raw('(SELECT IFNULL(SUM(sales.quantitykilo), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS quantitykilo'),
                    DB::raw('(SELECT IFNULL(SUM(sales.quantitylitres), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS quantitylitres'),
                    DB::raw('(SELECT IFNULL(SUM(sales.salesamountphysical), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS salesamountphysical'),
                    DB::raw('(SELECT IFNULL(SUM(sales.salesamountcoopbazaar), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS salesamountcoopbazaar')
                )
                ->get();
        }
        else{
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(sales.noofvarieties), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS varieties'),
                    DB::raw('(SELECT IFNULL(SUM(sales.noofoutlets), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS outlets'),
                    DB::raw('(SELECT IFNULL(SUM(sales.noofcustomers), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS customers'),
                    DB::raw('(SELECT IFNULL(SUM(sales.nooffarmers), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS farmers'),
                    DB::raw('(SELECT IFNULL(SUM(sales.quantitykilo), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS quantitykilo'),
                    DB::raw('(SELECT IFNULL(SUM(sales.quantitylitres), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS quantitylitres'),
                    DB::raw('(SELECT IFNULL(SUM(sales.salesamountphysical), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS salesamountphysical'),
                    DB::raw('(SELECT IFNULL(SUM(sales.salesamountcoopbazaar), 0)
                FROM sales
                WHERE sales.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS salesamountcoopbazaar')
                )
                ->get();

        }
        return view("superadmin.salereport", compact('results','societiestypes','societyTypesFilter'));
//        return view("superadmin.salereport", compact('sales', 'salereportdate'));
    }

    function croploanreport(Request $request)
    {

       /* $croploanreportdate = $request->croploanreportdate;

        if (!empty($croploanreportdate)) {
            $croploanreportdate = $request->croploanreportdate;
        } else {
            $croploanreportdate = date("Y-m-d");
        }

        $croploan_entry = Croploan_entry::where('saledate', $croploanreportdate)->paginate(5);

        return view("superadmin.croploanreport", compact('croploan_entry', 'croploanreportdate'));*/
        $societiestypes = Mtr_societytype::all();
        $societyTypesFilter=$request->input('societyTypes');
        if(!empty($societyTypesFilter)) {
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.noofappreceived), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS noofappreceived'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.noofappsanctioned), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS noofappsanctioned'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.noofapppending), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS noofapppending'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.totalcultivatedarea), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS totalcultivatedarea'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.cultivatedarealoanissuedto), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS cultivatedarealoanissuedto'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.outstandingno), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS outstandingno'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.outstandingamount), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS outstandingamount'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.overdueno), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS overdueno'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.overdueamount), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS overdueamount')
                )
                ->get();
        }
        else{


            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.noofappreceived), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS noofappreceived'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.noofappsanctioned), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS noofappsanctioned'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.noofapppending), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS noofapppending'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.totalcultivatedarea), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS totalcultivatedarea'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.cultivatedarealoanissuedto), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS cultivatedarealoanissuedto'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.outstandingno), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS outstandingno'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.outstandingamount), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS outstandingamount'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.overdueno), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS overdueno'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.overdueamount), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS overdueamount')
                )
                ->get();



        }
        return view("superadmin.croploanreport", compact('results','societiestypes','societyTypesFilter'));
    }


    function userslist()
    {

        $users = User::all();

        return view("superadmin.userslist", compact('users'));
    }

    function useradd()
    {

        $mtr_region = Mtr_region::all();
        $mtr_role = Mtr_role::all();
        return view("superadmin.useradd", compact('mtr_region', 'mtr_role'));
    }

    function userstore(Request $request)
    {


        $User = new User;
        $User->username = isset($request->username) ? $request->username : NULL;
        $User->name = isset($request->name) ? $request->name : NULL;
        $User->email = isset($request->email) ? $request->email : NULL;
        $User->password = Hash::make(123456);
        $User->region_id = isset($request->region_id) ? $request->region_id : NULL;
        $User->circle_id = isset($request->circle_id) ? $request->circle_id : NULL;
        $User->society_id = isset($request->society_id) ? $request->society_id : NULL;
        $User->role = isset($request->role) ? $request->role : NULL;
        $User->save();

        return redirect('/superadmin/user/add')->with('status', 'User added successfully');
    }


    function fetchcircle(Request $request)
    {

        $cirlces = Mtr_circle::where('region_id', $request->region_id)->where('status', 1)->get();
        return response()->json(array('data' => $cirlces), 200);
    }


    function fetchsociety(Request $request)
    {

        $society = Mtr_society::where('circle_id', $request->circle_id)->where('region_id', $request->region_id)->where('status', 1)->get();
        return response()->json(array('data' => $society), 200);
    }

    public function godownreport(Request $request)
    {
        /*$godownreportdate = $request->input('godownreportdate', date("Y-m-d"));

        $godowns = Godowns::all();

        $godownreportdata = array();

        foreach ($godowns as $godown) {
            $godowndate = $godown->godowndate;
            $count = $godown->count;
            $capacity = $godown->capacity;
            $utilized = $godown->utilized;
            $percentageUtilized = $godown->percentageutilized;
            $income = $godown->income;

            $godownData = array();
            $godownData['godowndate'] = date("d-m-Y", strtotime($godowndate));
            $godownData['count'] = $count;
            $godownData['capacity'] = $capacity;
            $godownData['utilized'] = $utilized;
            $godownData['percentageutilized'] = $percentageUtilized;
            $godownData['income'] = $income;

            array_push($godownreportdata, $godownData);
        }*/

        $societiestypes = Mtr_societytype::all();
        $societyTypesFilter=$request->input('societyTypes');
        if(!empty($societyTypesFilter)) {
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(purchases.govtvalues), 0)
                FROM purchases
                WHERE purchases.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS Govt_institution'),
                    DB::raw('(SELECT IFNULL(SUM(purchases.coopvalues), 0)
                FROM purchases
                WHERE purchases.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS Coop'),
                    DB::raw('(SELECT IFNULL(SUM(purchases.jpcvalues), 0)
                FROM purchases
                WHERE purchases.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS jpc')
                )
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(godowns.count), 0)
                FROM godowns
                WHERE godowns.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS count'),
                    DB::raw('(SELECT IFNULL(SUM(godowns.capacity), 0)
                FROM godowns
                WHERE godowns.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS capacity'),
                    DB::raw('(SELECT IFNULL(SUM(godowns.utilized), 0)
                FROM godowns
                WHERE godowns.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS utilized'),
                    DB::raw('CONCAT(
                    ROUND(
                            IFNULL(
                                (SELECT SUM(godowns.utilized)
                                 FROM godowns
                                 WHERE godowns.user_id IN (
                                     SELECT users.id
                                     FROM users
                                     WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                                 )), 0
                            ) /
                            IFNULL(
                                (SELECT SUM(godowns.capacity)
                                 FROM godowns
                                 WHERE godowns.user_id IN (
                                     SELECT users.id
                                     FROM users
                                     WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                                 )), 0
                            ) * 100, 2
                        ),
                    "(%)"
                ) AS Percentage'),
                    DB::raw('(SELECT IFNULL(SUM(godowns.income), 0)
                FROM godowns
                WHERE godowns.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS income')
                )
                ->get();
        }
        else{

            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(godowns.count), 0)
                FROM godowns
                WHERE godowns.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS count'),
                    DB::raw('(SELECT IFNULL(SUM(godowns.capacity), 0)
                FROM godowns
                WHERE godowns.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS capacity'),
                    DB::raw('(SELECT IFNULL(SUM(godowns.utilized), 0)
                FROM godowns
                WHERE godowns.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS utilized'),
                    DB::raw('CONCAT(
                    ROUND(
                            IFNULL(
                                (SELECT SUM(godowns.utilized)
                                 FROM godowns
                                 WHERE godowns.user_id IN (
                                     SELECT users.id
                                     FROM users
                                     WHERE users.region_id = a.id
                                 )), 0
                            ) /
                            IFNULL(
                                (SELECT SUM(godowns.capacity)
                                 FROM godowns
                                 WHERE godowns.user_id IN (
                                     SELECT users.id
                                     FROM users
                                     WHERE users.region_id = a.id
                                 )), 0
                            ) * 100, 2
                        ),
                    "(%)"
                ) AS Percentage'),
                    DB::raw('(SELECT IFNULL(SUM(godowns.income), 0)
                FROM godowns
                WHERE godowns.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS income')
                )
                ->get();


        }
        return view("superadmin.godownreport", compact('results','societiestypes','societyTypesFilter'));

//        return view("superadmin.godownreport", compact('godownreportdata', 'godownreportdate'));
    }


    public function export_loanreport(Request $request)
    {

        $filename = "loan_export_" . $request->loanreportdate . ".xlsx";
        return Excel::download(new LoanExport($request->loanreportdate), $filename);
    }

    public function tableaudashboard(Request $request)
    {


        return view("superadmin.tableaudashboard");
    }

    function IND_money_format($number)
    {
        $decimal = (string)($number - floor($number));
        $money = floor($number);
        $length = strlen($money);
        $delimiter = '';
        $money = strrev($money);

        for ($i = 0; $i < $length; $i++) {
            if (($i == 3 || ($i > 3 && ($i - 1) % 2 == 0)) && $i != $length) {
                $delimiter .= ',';
            }
            $delimiter .= $money[$i];
        }

        $result = strrev($delimiter);
        $decimal = preg_replace("/0\./i", ".", $decimal);
        $decimal = substr($decimal, 0, 3);

        if ($decimal != '0') {
            $result = $result . $decimal;
        }

        return $result;
    }

    function loanlist(Request $request)
    {
        /*$regions = Mtr_region::all();
        $circles = Mtr_circle::all();
        $societies = Mtr_society::all();
        $societiestypes = Mtr_societytype::all();
        $loantypes=Mtr_loan::all();


        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();
        $loans = Loan::select('*')->with('loantype')->get();

        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');

        // Build the Loan query with additional conditions
        $query = Loan::select('*')->with('loantype');

        if ($regionFilter || $circleFilter || $societyFilter) {
            $query->whereIn('user_id', function ($subquery) use ($societyTypesFilter, $circleFilter, $regionFilter, $societyFilter) {
                $subquery->select('id')->from('users');
                if (!empty($regionFilter)) {
                    // Apply condition for region filter
                    $subquery->where('region_id', $regionFilter);
                }
                if (!empty($societyFilter)) {
                    // Apply condition for society filter
                    $subquery->where('society_id', $societyFilter);
                }
                if ($circleFilter) {
                    // Apply condition for circle filter
                    $subquery->where('circle_id', $circleFilter);
                }
                if ($societyTypesFilter) {
                    // Apply condition for socitytype filter
                    $subquery->where('role', Mtr_societytype::where('id', $societyTypesFilter)->value('role_id'));
                }
            });
        } else {
        }


        if ($startDate && $endDate) {
            // Apply condition for circle filter
            $query->wherebetween('loandate', ["$startDate","$endDate"]);
        }
        else{
            if ($startDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('loandate', '>=', $startDate);
            }
            if ($endDate) {
                // Apply condition for 'loandate' greater than '$startDate'
                $query->whereDate('loandate', '<=', $endDate);
            }

        }
        if($loantypeFilter)
        {
            $query->where('loantype_id', $loantypeFilter);
        }*/
        $regions = Mtr_region::all();
        $circles = Mtr_circle::all();
        $societies = Mtr_society::all();
        $societiestypes = Mtr_societytype::all();
        $loantypes=Mtr_loan::all();
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');
        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();

        $filteredLoans = LoanQueryService::getFilteredLoans($request, true);
        $loans = $filteredLoans;
        $secTableRecords = LoanQueryService::getFilteredLoans($request);
        $secTableRecords->groupBy('loandate', 'loantype_id');
        $secTableRecords = $secTableRecords->filter(function ($group) {
            return $group->count() > 1;
        });
        $subloans = $secTableRecords;
        return view("loan.list", compact('loans', 'regions', 'circles', 'societies','societiestypes','loantypes','regionFilter','circleFilter','societyFilter','startDate','endDate','societyTypesFilter','loantypeFilter', 'subloans'));
    }


    function depositlist(Request $request)
    {

        $regions = Mtr_region::all();
        $circles = Mtr_circle::all();
        $societies = Mtr_society::all();
        $societiestypes = Mtr_societytype::all();
        $loantypes=Mtr_loan::all();
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');
        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();

        $filteredDeposit = LoanQueryService::getFilteredDeposits($request);
//        $loans = $filteredLoans;
        $deposits = $filteredDeposit;
        return view("deposit.list", compact('deposits', 'regions', 'circles', 'societies','societiestypes','regionFilter','circleFilter','societyFilter','startDate','endDate','societyTypesFilter','loantypeFilter'));
//        return view("deposit.list", compact('deposits'));
    }

    function purchaselist(Request $request)
    {


        $regions = Mtr_region::all();
        $circles = Mtr_circle::all();
        $societies = Mtr_society::all();
        $societiestypes = Mtr_societytype::all();
        $loantypes=Mtr_loan::all();
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');
        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();

        $filteredpurchase = LoanQueryService::getFilteredPurchase($request);
//        $loans = $filteredLoans;
        $purchases = $filteredpurchase;
        return view("purchase.list", compact('purchases', 'regions', 'circles', 'societies','societiestypes','regionFilter','circleFilter','societyFilter','startDate','endDate','societyTypesFilter','loantypeFilter'));
    }

    function saleslist(Request $request)
    {

        $regions = Mtr_region::all();
        $circles = Mtr_circle::all();
        $societies = Mtr_society::all();
        $societiestypes = Mtr_societytype::all();
        $loantypes=Mtr_loan::all();
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');
        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();

        $filteredpurchase = LoanQueryService::getFilteredSales($request);
//        $loans = $filteredLoans;
        $sales = $filteredpurchase;
        return view("sales.list", compact('sales', 'regions', 'circles', 'societies','societiestypes','regionFilter','circleFilter','societyFilter','startDate','endDate','societyTypesFilter','loantypeFilter'));
    }

    function godownlist(Request $request)
    {

        $regions = Mtr_region::all();
        $circles = Mtr_circle::all();
        $societies = Mtr_society::all();
        $societiestypes = Mtr_societytype::all();
        $loantypes=Mtr_loan::all();
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');
        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();

        $filteredpurchase = LoanQueryService::getFilteredGodown($request);
//        $loans = $filteredLoans;
        $godowns = $filteredpurchase;
        return view("godown.list", compact('godowns', 'regions', 'circles', 'societies','societiestypes','regionFilter','circleFilter','societyFilter','startDate','endDate','societyTypesFilter','loantypeFilter'));
    }

    function serviceslist(Request $request)
    {

        $regions = Mtr_region::all();
        $circles = Mtr_circle::all();
        $societies = Mtr_society::all();
        $societiestypes = Mtr_societytype::all();
        $loantypes=Mtr_loan::all();
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');
        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();
        $mtrservices = Mtr_services::all();
        $filteredpurchase = LoanQueryService::getFilteredService($request);
//        $loans = $filteredLoans;
        $services = $filteredpurchase;
        return view("services.list", compact('services', 'regions', 'circles', 'societies','societiestypes','regionFilter','circleFilter','societyFilter','startDate','endDate','societyTypesFilter','loantypeFilter', 'mtrservices'));
//        $services = Services::select('*')->paginate(5);
//        return view("services.list", compact('services'));
    }

    function croploanentrycropwiselist(Request $request)
    {

        $croploan_cropwise = Croploan_cropwise::where('croploan_id', $request->route('croploan_id'))->paginate(5);

        return view("croploan.entry.cropwiselist", compact('croploan_cropwise'));
    }

    function croploanlist(Request $request)
    {

        $regions = Mtr_region::all();
        $circles = Mtr_circle::all();
        $societies = Mtr_society::all();
        $societiestypes = Mtr_societytype::all();
        $loantypes=Mtr_loan::all();
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');
        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleFilter, $regionFilter) {
                $query->select('role')
                    ->from('users');
                if($regionFilter) {
                    $query->where('region_id', $regionFilter);
                }
                if($circleFilter) {
                    $query->where('circle_id', $circleFilter);
                }
            });

        $societiestypes=$soctietyvalue->get();

        $filteredpurchase = LoanQueryService::getFilteredCropLoan($request);
//        $loans = $filteredLoans;
        $croploan_entry = $filteredpurchase;
        return view("croploan.entry.list", compact('croploan_entry', 'regions', 'circles', 'societies','societiestypes','regionFilter','circleFilter','societyFilter','startDate','endDate','societyTypesFilter','loantypeFilter'));
        $croploan_entry = Croploan_entry::select('*')->paginate(5);

        return view("croploan.entry.list", compact('croploan_entry'));
    }
}
