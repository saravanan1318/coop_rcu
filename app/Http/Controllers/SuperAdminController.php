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
use Illuminate\Support\Facades\URL;

class SuperAdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role == 2  || Auth::user()->role == 1) {
                return $next($request);
            }
            abort(403);
        });
    }

    function dashboard(Request $request)
    {
        $disrict=$request->input("Region");
        $circleid=$request->input("circle");
        $fromlogged =0;
        if(!empty($disrict)&& isset($disrict)&&!empty($circleid)&& isset($circleid))
        {
            $fromlogged =$request->input("fromlogged");
            $societies = Mtr_society::select([
                'mtr_society.society_name as societyName',
                'mtr_society.id as societyID',
                DB::raw('(SELECT COUNT(DISTINCT userid ) FROM loggedsessions WHERE regionid='.$disrict.' AND circleid='.$circleid.' AND societyid=mtr_society.id and Date(created_at) = CURDATE()) AS societycount'),
                DB::raw('(SELECT created_at FROM loggedsessions WHERE regionid='.$disrict.' AND circleid='.$circleid.' AND societyid=mtr_society.id and Date(created_at) = CURDATE()  LIMIT 1  ) AS societyLoginTime')
            ])
                ->where('region_id', $disrict)
                ->where('circle_id',$circleid)
                ->get();
            $region = Mtr_region::select('region_name')->where('id', $disrict)->first();
            $circle = Mtr_circle::select('circle_name')->where('id', $circleid)->first();
            $region_name=$region->region_name;
            $circle_name=$circle->circle_name;
            $title = "Details of societies  not logged in the portal.";
            return view("superadmin.dashboard",compact("societies","title","disrict","circle" ,"region_name","circle_name","fromlogged"));
        }
        elseif(!empty($disrict)&& isset($disrict))
        {
            $circles = Mtr_circle::select([
                'mtr_circle.circle_name as circleName',
                'mtr_circle.id as circleID',
                DB::raw('(SELECT COUNT(DISTINCT userid) FROM loggedsessions WHERE regionid = '.$disrict.' AND circleid = mtr_circle.id and Date(created_at) = CURDATE()) as counts'),
                DB::raw('(SELECT COUNT(*) FROM users WHERE users.region_id = '.$disrict.' AND users.circle_id=mtr_circle.id AND users.society_id IS NOT NULL) as total_no_of_society')
            ])
                ->where('region_id', $disrict)
                ->get();
            $region = Mtr_region::select('region_name')->where('id', $disrict)->first();
            $region_name=$region->region_name;
            $title = "Details of societies not logged in the portal";
            return view("superadmin.dashboard",compact("circles","title","disrict","region_name"));
        }
        else {
            $regions = DB::table('mtr_region as a')
                ->select([
                    'a.region_name as Region_Name',
                    'a.id as Region_ID',
                    DB::raw('(SELECT COUNT(DISTINCT ls.userid) FROM loggedsessions as ls WHERE ls.regionid = a.id AND DATE(ls.created_at) = CURDATE()) as logged_socities'),
                    DB::raw('(SELECT COUNT(*) FROM users WHERE users.region_id = a.id AND users.society_id IS NOT NULL) as total_no_of_society')
                ])
                ->get();
            $title = "Details of societies not logged in the portal";
        }
        return view("superadmin.dashboard",compact("regions","title"));
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
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $regions = Mtr_region::all();
        $circles = Mtr_circle::all();
        $societiestypes = Mtr_societytype::all();
        $societies = Mtr_society::all();
        $loantypes = Mtr_loan::all();
        $currentUrl = URL::current();

        if (!empty($loanreportdate)) {
            $loanreportdate = $request->loanreportdate;
        } else {
            $loanreportdate = date("Y-m-d");
        }

//        $loans = Loan::where('loandate', $loanreportdate)->paginate(5);
        $societiestypes = Mtr_societytype::all();
        $societyTypesFilter=$request->input('societyTypes');
        $district= $request->input("region");
        if(!empty($circleFilter))
        {
            if(empty($startDate) && !empty($endDate))
            {
                $startDate = date( "Y-m-d", strtotime(now()));
            }
            if(!empty($startDate) && empty($endDate))
            {
                $endDate = date( "Y-m-d", strtotime(now()));
            }


            $Circleresults = DB::table('mtr_society AS mtc')
                ->select(
                    'mtc.id AS societyID',
                    'mtc.society_name AS SocietyName',
                    DB::raw('(SELECT IFNULL(SUM(loan_onetimeentry.annual_target), 0) FROM loan_onetimeentry WHERE loan_onetimeentry.user_id IN (SELECT users.id FROM users WHERE users.region_id = '.$district.' AND users.circle_id =  '.$circleFilter.' AND users.society_id=mtc.id )
                    ' . ($loantypeFilter ? 'AND loan_onetimeentry.loan_id = ' . $loantypeFilter : '') . ') AS Loan_Target_2023_24'),
                    DB::raw('(SELECT IFNULL(SUM(loan.disbursedamount), 0) FROM loan WHERE loan.user_id IN (SELECT users.id FROM users WHERE users.region_id = '.$district.' AND users.circle_id =  '.$circleFilter.' AND users.society_id=mtc.id)
                    ' . ($loantypeFilter ? 'AND loan.loantype_id = ' . $loantypeFilter : '') .  ($startDate && $endDate ? ' AND loan.loandate BETWEEN \'' . $startDate . '\' AND \'' . $endDate . '\'' : '')  . ') AS Disbursed_Amount')
                )
                ->where('region_id', $district)
                ->get();
            return view("superadmin.loanreport", compact('loanreportdate', 'district','Circleresults', 'societiestypes', 'societyTypesFilter', 'regions', 'regionFilter', 'circles', 'circleFilter', 'loantypes', 'startDate', 'endDate', 'societyTypesFilter', 'loantypeFilter'));
        }
        elseif(!empty($district))
        {
            if(empty($startDate) && !empty($endDate))
            {
                $startDate = date( "Y-m-d", strtotime(now()));
            }
            if(!empty($startDate) && empty($endDate))
            {
                $endDate = date( "Y-m-d", strtotime(now()));
            }


            $Regionresults = DB::table('mtr_circle AS mtc')
                ->select(
                    'mtc.id AS circleID',
                    'mtc.circle_name AS circleName',
                    DB::raw('(SELECT IFNULL(SUM(loan_onetimeentry.annual_target), 0) FROM loan_onetimeentry WHERE loan_onetimeentry.user_id IN (SELECT users.id FROM users WHERE users.region_id = '.$district.' AND users.circle_id = mtc.id ' . ($societyTypesFilter ? ' AND users.role = \'' . $societyTypesFilter . '\'' : '') . ')
                    ' . ($loantypeFilter ? 'AND loan_onetimeentry.loan_id = ' . $loantypeFilter : '') . ') AS Loan_Target_2023_24'),
                    DB::raw('(SELECT IFNULL(SUM(loan.disbursedamount), 0) FROM loan WHERE loan.user_id IN (SELECT users.id FROM users WHERE users.region_id = '.$district.' AND users.circle_id = mtc.id ' . ($societyTypesFilter ? ' AND users.role = \'' . $societyTypesFilter . '\'' : '') . ')' . ($loantypeFilter ? 'AND loan.loantype_id = ' . $loantypeFilter : '') .  ($startDate && $endDate ? ' AND loan.loandate BETWEEN \'' . $startDate . '\' AND \'' . $endDate . '\'' : '')  . ') AS Disbursed_Amount')
                )
                ->where('region_id', $district)
                ->get();


            return view("superadmin.loanreport", compact('loanreportdate', 'district','Regionresults', 'societiestypes', 'societyTypesFilter', 'regions', 'regionFilter', 'circles', 'circleFilter', 'loantypes', 'startDate', 'endDate', 'societyTypesFilter', 'loantypeFilter'));

        }


//        $results = DB::select('SELECT * FROM view_regionwise_credit_and_deopsit');



        else {
            if (!empty($societyTypesFilter) || !empty($loantypeFilter)) {
                if(empty($startDate) && !empty($endDate))
                {
                    $startDate = date( "Y-m-d", strtotime(now()));
                }
                if(!empty($startDate) && empty($endDate))
                {
                    $endDate = date( "Y-m-d", strtotime(now()));
                }
                $results = DB::table('mtr_region AS a')
                    ->select(
                        'a.region_name AS Region_Name',
                        'a.id As regionId',
                        DB::raw('(SELECT IFNULL(SUM(loan_onetimeentry.annual_target), 0)
            FROM loan_onetimeentry
            WHERE loan_onetimeentry.user_id IN (
                SELECT users.id FROM users
                WHERE users.region_id = a.id ' . ($societyTypesFilter ? 'AND users.role = \'' . $societyTypesFilter . '\'' : '') . ')
            ' . ($loantypeFilter ? 'AND loan_onetimeentry.loan_id = ' . $loantypeFilter : '')  . ') AS Loan_Target_2023_24'),
                        DB::raw('(SELECT IFNULL(SUM(loan.disbursedamount), 0)
            FROM loan
            WHERE loan.user_id IN (
                SELECT users.id FROM users
                WHERE users.region_id = a.id ' . ($societyTypesFilter ? 'AND users.role = \'' . $societyTypesFilter . '\'' : '') . ')
            ' . ($loantypeFilter ? 'AND loan.loantype_id = ' . $loantypeFilter : '') .  ($startDate && $endDate ? ' AND loan.loandate BETWEEN \'' . $startDate . '\' AND \'' . $endDate . '\'' : '')  . ') AS Disbursed_Amount')
                    )
                    ->get();
            } else {
                $results = DB::table('mtr_region AS a')
                    ->select(
                        'a.region_name AS Region_Name',
                        'a.id As regionId',
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


//        $results = DB::select('SELECT * FROM view_regionwise_credit_and_deopsit');

            return view("superadmin.loanreport", compact('loanreportdate', 'results', 'societiestypes', 'societyTypesFilter', 'regions', 'regionFilter', 'circles', 'circleFilter', 'loantypes', 'startDate', 'endDate', 'societyTypesFilter', 'loantypeFilter'));
        }
    }

    function loanreportsuperadmin(Request $request)
    {

        $loanreportdate = $request->loanreportdate;
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');
        $societyTypesFilter = $request->input('societyTypes');
        $loantypeFilter = $request->input('loantype');

        $regions = Mtr_region::all();
        $circles = Mtr_circle::all();
        $societiestypes = Mtr_societytype::all();
        $societies = Mtr_society::all();
        $loantypes = Mtr_loan::all();
        $currentUrl = URL::current();

        if (!empty($loanreportdate)) {
            $loanreportdate = $request->loanreportdate;
        } else {
            $loanreportdate = date("Y-m-d");
        }

        $societiestypes = Mtr_societytype::all();
        $societyTypesFilter=$request->input('societyTypes');
        $district= $request->input("region");
        if(!empty($circleFilter))
        {
            if(empty($startDate) && !empty($endDate))
            {
                $startDate = date( "Y-m-d", strtotime(now()));
            }
            if(!empty($startDate) && empty($endDate))
            {
                $endDate = date( "Y-m-d", strtotime(now()));
            }


            $Circleresults = DB::table('mtr_society AS mtc')
                ->select(
                    'mtc.id AS societyID',
                    'mtc.society_name AS SocietyName',
                    DB::raw('(SELECT IFNULL(SUM(loan_onetimeentry.annual_target), 0) FROM loan_onetimeentry WHERE loan_onetimeentry.user_id IN (SELECT users.id FROM users WHERE users.region_id = '.$district.' AND users.circle_id =  '.$circleFilter.' AND users.society_id=mtc.id )
                    ' . ($loantypeFilter ? 'AND loan_onetimeentry.loan_id = ' . $loantypeFilter : '') . ') AS Loan_Target_2023_24'),
                    DB::raw('(SELECT IFNULL(SUM(loan.disbursedamount), 0) FROM loan WHERE loan.user_id IN (SELECT users.id FROM users WHERE users.region_id = '.$district.' AND users.circle_id =  '.$circleFilter.' AND users.society_id=mtc.id)
                    ' . ($loantypeFilter ? 'AND loan.loantype_id = ' . $loantypeFilter : '') .  ($startDate && $endDate ? ' AND loan.loandate BETWEEN \'' . $startDate . '\' AND \'' . $endDate . '\'' : '')  . ') AS Disbursed_Amount')
                )
                ->where('region_id', $district)
                ->get();
            return view("superadmin.loanreport", compact('loanreportdate', 'district','Circleresults', 'societiestypes', 'societyTypesFilter', 'regions', 'regionFilter', 'circles', 'circleFilter', 'loantypes', 'startDate', 'endDate', 'societyTypesFilter', 'loantypeFilter'));
        }
        elseif(!empty($district))
        {
            if(empty($startDate) && !empty($endDate))
            {
                $startDate = date( "Y-m-d", strtotime(now()));
            }
            if(!empty($startDate) && empty($endDate))
            {
                $endDate = date( "Y-m-d", strtotime(now()));
            }


            $Regionresults = DB::table('mtr_circle AS mtc')
                ->select(
                    'mtc.id AS circleID',
                    'mtc.circle_name AS circleName',
                    DB::raw('(SELECT IFNULL(SUM(loan_onetimeentry.annual_target), 0) FROM loan_onetimeentry WHERE loan_onetimeentry.user_id IN (SELECT users.id FROM users WHERE users.region_id = '.$district.' AND users.circle_id = mtc.id ' . ($societyTypesFilter ? ' AND users.role = \'' . $societyTypesFilter . '\'' : '') . ')
                    ' . ($loantypeFilter ? 'AND loan_onetimeentry.loan_id = ' . $loantypeFilter : '') . ') AS Loan_Target_2023_24'),
                    DB::raw('(SELECT IFNULL(SUM(loan.disbursedamount), 0) FROM loan WHERE loan.user_id IN (SELECT users.id FROM users WHERE users.region_id = '.$district.' AND users.circle_id = mtc.id ' . ($societyTypesFilter ? ' AND users.role = \'' . $societyTypesFilter . '\'' : '') . ')' . ($loantypeFilter ? 'AND loan.loantype_id = ' . $loantypeFilter : '') .  ($startDate && $endDate ? ' AND loan.loandate BETWEEN \'' . $startDate . '\' AND \'' . $endDate . '\'' : '')  . ') AS Disbursed_Amount')
                )
                ->where('region_id', $district)
                ->get();


            return view("superadmin.loanreport", compact('loanreportdate', 'district','Regionresults', 'societiestypes', 'societyTypesFilter', 'regions', 'regionFilter', 'circles', 'circleFilter', 'loantypes', 'startDate', 'endDate', 'societyTypesFilter', 'loantypeFilter'));

        }
        else {


            if (!empty($regionFilter)) {

                if(empty($startDate) && !empty($endDate))
                {
                    $startDate = date( "Y-m-d", strtotime(now()));
                }
                if(!empty($startDate) && empty($endDate))
                {
                    $endDate = date( "Y-m-d", strtotime(now()));
                }


                $results = DB::select( DB::raw("select `a`.`loantype` as `loantype`, `a`.`id` as `loantypeid`,
                (SELECT IFNULL(SUM(loan_onetimeentry.annual_target), 0) FROM loan_onetimeentry WHERE loan_onetimeentry.loan_id = a.id
                AND loan_onetimeentry.user_id IN (SELECT users.id FROM users WHERE users.region_id = '.$regionFilter.')) AS Loan_Target_2023_24,
                (SELECT IFNULL(SUM(loan.disbursedamount), 0) FROM loan WHERE loan.loantype_id = a.id AND loan.user_id IN (SELECT users.id FROM users
                WHERE users.region_id = '.$regionFilter.') ($startDate && $endDate ? ' AND loan.loandate BETWEEN \'' . $startDate . '\' AND \'' . $endDate . '\'' : '') AS Disbursed_Amount,
                CONCAT(ROUND(IFNULL((SELECT SUM(loan.disbursedamount)
                FROM loan WHERE loan.loantype_id = a.id AND loan.user_id IN (SELECT users.id FROM users
                WHERE users.region_id = '.$regionFilter.') ($startDate && $endDate ? ' AND loan.loandate BETWEEN \'' . $startDate . '\' AND \'' . $endDate . '\'' : ''), 0 ) / IFNULL( (SELECT SUM(loan_onetimeentry.annual_target) FROM loan_onetimeentry
                WHERE loan_onetimeentry.loan_id = a.id AND loan_onetimeentry.user_id IN (SELECT users.id FROM users WHERE users.region_id = '.$regionFilter.')), 0 ) * 100, 2 ), '%' )
                AS Percent_of_Loan from `mtr_loan` as `a`") );

            } else {

                $results = DB::select( DB::raw("select `a`.`loantype` as `loantype`, `a`.`id` as `loantypeid`,
                (SELECT IFNULL(SUM(loan_onetimeentry.annual_target), 0) FROM loan_onetimeentry WHERE loan_onetimeentry.loan_id = a.id)
                AS Loan_Target_2023_24, (SELECT IFNULL(SUM(loan.disbursedamount), 0)
                FROM loan WHERE loan.loantype_id = a.id) AS Disbursed_Amount,
                CONCAT(ROUND(IFNULL((SELECT SUM(loan.disbursedamount)
                FROM loan WHERE loan.loantype_id = a.id), 0 ) / IFNULL( (SELECT SUM(loan_onetimeentry.annual_target) FROM loan_onetimeentry
                WHERE loan_onetimeentry.loan_id = a.id), 0 ) * 100, 2 ), '%' ) AS Percent_of_Loan from `mtr_loan` as `a`") );


            }

//            return view("superadmin.loanreport", compact('loanreportdate','results', 'district', 'societiestypes', 'societyTypesFilter', 'regions', 'regionFilter', 'circles', 'circleFilter', 'loantypes', 'startDate', 'endDate', 'societyTypesFilter', 'loantypeFilter'));
            return view("superadmin.loanreport", compact('loanreportdate', 'results', 'societiestypes', 'societyTypesFilter', 'regions', 'regionFilter', 'circles', 'circleFilter', 'loantypes', 'startDate', 'endDate', 'societyTypesFilter', 'loantypeFilter'));
        }
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

    function byireport(Request $request)
    {


        $societiestypes = Mtr_societytype::all();
        $societyTypesFilter=$request->input('societyTypes');
        $startDate= $request->input('startDate');
        $endDate= $request->input('endDate');
        if(!empty($startDate)) {
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(drpds_byi.prb), 0) FROM drpds_byi WHERE drpds_byi.region_id = a.id AND drpds_byi.region_id = a.id AND drpds_byi.identifieddate BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS prb'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_byi.fps), 0) FROM drpds_byi WHERE drpds_byi.region_id = a.id AND drpds_byi.identifieddate BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS fps'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_byi.fpsc), 0) FROM drpds_byi WHERE drpds_byi.region_id = a.id AND drpds_byi.identifieddate BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS fpsc'),
                )
                ->get();
        }
        else{
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(drpds_byi.prb), 0) FROM drpds_byi WHERE drpds_byi.region_id = a.id AND MONTH(drpds_byi.identifieddate) = MONTH(NOW())) AS prb'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_byi.fps), 0) FROM drpds_byi WHERE drpds_byi.region_id = a.id AND MONTH(drpds_byi.identifieddate)= MONTH(NOW())) AS fps'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_byi.fpsc), 0) FROM drpds_byi WHERE drpds_byi.region_id = a.id AND MONTH(drpds_byi.identifieddate)= MONTH(NOW()) ) AS fpsc'),
                )
                ->get();

        }
        return view("superadmin.byireport", compact('results','startDate','endDate'));
    }

    function faciliftingreport(Request $request)
    {


        $societiestypes = Mtr_societytype::all();
        $societyTypesFilter=$request->input('societyTypes');
        $startDate= $request->input('startDate');
        $endDate= $request->input('endDate');
        if(!empty($startDate)) {

            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(drpds_facelifting.fpsb), 0) FROM drpds_facelifting WHERE drpds_facelifting.region_id = a.id AND drpds_facelifting.faceliftingdate BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS fpsb'),
                    DB::raw('    (SELECT IFNULL(SUM(drpds_facelifting.fpsp), 0) FROM drpds_facelifting WHERE drpds_facelifting.region_id = a.id AND  drpds_facelifting.faceliftingdate BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS fpsp'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_facelifting.due), 0) FROM drpds_facelifting WHERE drpds_facelifting.region_id = a.id AND drpds_facelifting.faceliftingdate BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS due'),
                )
                ->get();
        }
        else{
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(drpds_facelifting.fpsb), 0) FROM drpds_facelifting WHERE drpds_facelifting.region_id = a.id AND MONTH(drpds_facelifting.faceliftingdate) = MONTH(NOW())) AS fpsb'),
                    DB::raw('    (SELECT IFNULL(SUM(drpds_facelifting.fpsp), 0) FROM drpds_facelifting WHERE drpds_facelifting.region_id = a.id AND MONTH(drpds_facelifting.faceliftingdate)= MONTH(NOW())) AS fpsp'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_facelifting.due), 0) FROM drpds_facelifting WHERE drpds_facelifting.region_id = a.id AND MONTH(drpds_facelifting.faceliftingdate)= MONTH(NOW()) ) AS due'),
                )
                ->get();

        }
        return view("superadmin.facelifting", compact('results','startDate','endDate'));
    }
    function isoreport(Request $request)
    {


        $startDate= $request->input('startDate');
        $endDate= $request->input('endDate');
        if(!empty($startDate)) {

            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(drpds_iso.ftfps), 0) FROM drpds_iso WHERE drpds_iso.region_id = a.id AND drpds_iso.isodate BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS ftfps'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_iso.ftfpsc), 0) FROM drpds_iso WHERE drpds_iso.region_id = a.id AND drpds_iso.isodate BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS ftfpsc'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_iso.wc), 0) FROM drpds_iso WHERE drpds_iso.region_id = a.id AND drpds_iso.isodate BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS wc'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_iso.twc), 0) FROM drpds_iso WHERE drpds_iso.region_id = a.id AND drpds_iso.isodate BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS twc'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_iso.percentage), 0) FROM drpds_iso WHERE drpds_iso.region_id = a.id AND drpds_iso.isodate BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS percentage'),
                )
                ->get();
        }
        else{
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(drpds_iso.ftfps), 0) FROM drpds_iso WHERE drpds_iso.region_id = a.id AND MONTH(drpds_iso.isodate) = MONTH(NOW())) AS ftfps'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_iso.ftfpsc), 0) FROM drpds_iso WHERE drpds_iso.region_id = a.id AND MONTH(drpds_iso.isodate)= MONTH(NOW())) AS ftfpsc'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_iso.wc), 0) FROM drpds_iso WHERE drpds_iso.region_id = a.id AND MONTH(drpds_iso.isodate)= MONTH(NOW()) ) AS wc'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_iso.twc), 0) FROM drpds_iso WHERE drpds_iso.region_id = a.id AND MONTH(drpds_iso.isodate)= MONTH(NOW()) ) AS twc'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_iso.percentage), 0) FROM drpds_iso WHERE drpds_iso.region_id = a.id AND MONTH(drpds_iso.isodate)= MONTH(NOW()) ) AS percentage'),

                )
                ->get();





        }
        return view("superadmin.iso", compact('results','startDate','endDate'));
    }

    function teareport(Request $request)
    {


        $startDate= $request->input('startDate');
        $endDate= $request->input('endDate');
        if(!empty($startDate)) {

            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(drpds_tea.fmc), 0) FROM drpds_tea WHERE drpds_tea.region_id = a.id AND drpds_tea.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS fmc'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_tea.nl), 0) FROM drpds_tea WHERE drpds_tea.region_id = a.id AND drpds_tea.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS nl'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_tea.purchase), 0) FROM drpds_tea WHERE drpds_tea.region_id = a.id AND drpds_tea.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS purchase'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_tea.sale), 0) FROM drpds_tea WHERE drpds_tea.region_id = a.id AND drpds_tea.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS sale'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_tea.percentage), 0) FROM drpds_tea WHERE drpds_tea.region_id = a.id AND drpds_tea.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS percentage'),
                )
                ->get();
        }
        else{
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(drpds_tea.fmc), 0) FROM drpds_tea WHERE drpds_tea.region_id = a.id AND MONTH(drpds_tea.created_at) = MONTH(NOW())) AS fmc'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_tea.nl), 0) FROM drpds_tea WHERE drpds_tea.region_id = a.id AND MONTH(drpds_tea.created_at) = MONTH(NOW())) AS nl'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_tea.purchase), 0) FROM drpds_tea WHERE drpds_tea.region_id = a.id AND MONTH(drpds_tea.created_at) = MONTH(NOW())) AS purchase'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_tea.sale), 0) FROM drpds_tea WHERE drpds_tea.region_id = a.id AND MONTH(drpds_tea.created_at) = MONTH(NOW())) AS sale'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_tea.percentage), 0) FROM drpds_tea WHERE drpds_tea.region_id = a.id AND MONTH(drpds_tea.created_at) = MONTH(NOW())) AS percentage'),
                )
                ->get();





        }
        return view("superadmin.tea", compact('results','startDate','endDate'));
    }

    function indcoreport(Request $request)
    {


        $startDate= $request->input('startDate');
        $endDate= $request->input('endDate');
        if(!empty($startDate)) {

            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(drpds_indcoserve.three), 0) FROM drpds_indcoserve WHERE drpds_indcoserve.region_id = a.id AND drpds_indcoserve.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS three'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_indcoserve.six), 0) FROM drpds_indcoserve WHERE drpds_indcoserve.region_id = a.id AND drpds_indcoserve.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS six'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_indcoserve.abovesix), 0) FROM drpds_indcoserve WHERE drpds_indcoserve.region_id = a.id AND drpds_indcoserve.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS abovesix'),
                )
                ->get();
        }
        else{
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(drpds_indcoserve.three), 0) FROM drpds_indcoserve WHERE drpds_indcoserve.region_id = a.id AND MONTH(drpds_indcoserve.created_at) = MONTH(NOW())) AS three'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_indcoserve.six), 0) FROM drpds_indcoserve WHERE drpds_indcoserve.region_id = a.id AND MONTH(drpds_indcoserve.created_at) = MONTH(NOW())) AS six'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_indcoserve.abovesix), 0) FROM drpds_indcoserve WHERE drpds_indcoserve.region_id = a.id AND MONTH(drpds_indcoserve.created_at) = MONTH(NOW())) AS abovesix'),
                )
                ->get();





        }
        return view("superadmin.indco", compact('results','startDate','endDate'));
    }

    function palmjaggeryreport(Request $request)
    {


        $startDate= $request->input('startDate');
        $endDate= $request->input('endDate');
        if(!empty($startDate)) {

            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(palm_jaggery.target), 0) FROM palm_jaggery WHERE palm_jaggery.region_id = a.id AND palm_jaggery.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS target'),
                    DB::raw('(SELECT IFNULL(SUM(palm_jaggery.achievement), 0) FROM palm_jaggery WHERE palm_jaggery.region_id = a.id AND palm_jaggery.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS achievement'),

                )
                ->get();
        }
        else{
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(palm_jaggery.target), 0) FROM palm_jaggery WHERE palm_jaggery.region_id = a.id AND MONTH(palm_jaggery.created_at) = MONTH(NOW())) AS target'),
                    DB::raw('(SELECT IFNULL(SUM(palm_jaggery.achievement), 0) FROM palm_jaggery WHERE palm_jaggery.region_id = a.id AND MONTH(palm_jaggery.created_at)= MONTH(NOW())) AS achievement'),

                )
                ->get();





        }
        return view("superadmin.palmjaggery", compact('results','startDate','endDate'));
    }
    function upi_fpsreport(Request $request)
    {


        $startDate= $request->input('startDate');
        $endDate= $request->input('endDate');
        if(!empty($startDate)) {

            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(upi_fps.fps_fulltime), 0) FROM upi_fps WHERE upi_fps.region_id = a.id AND upi_fps.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS fps_fulltime'),
                    DB::raw('(SELECT IFNULL(SUM(upi_fps.fps_parttime), 0) FROM upi_fps WHERE upi_fps.region_id = a.id AND upi_fps.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS fps_parttime'),
                    DB::raw('(SELECT IFNULL(SUM(upi_fps.upi_introduced), 0) FROM upi_fps WHERE upi_fps.region_id = a.id AND upi_fps.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS upi_introduced'),
                )
                ->get();
        }
        else{
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(upi_fps.fps_fulltime), 0) FROM upi_fps WHERE upi_fps.region_id = a.id AND MONTH(upi_fps.created_at) = MONTH(NOW())) AS fps_fulltime'),
                    DB::raw('(SELECT IFNULL(SUM(upi_fps.fps_parttime), 0) FROM upi_fps WHERE upi_fps.region_id = a.id AND MONTH(upi_fps.created_at)= MONTH(NOW())) AS fps_parttime'),
                    DB::raw('(SELECT IFNULL(SUM(upi_fps.upi_introduced), 0) FROM upi_fps WHERE upi_fps.region_id = a.id AND MONTH(upi_fps.created_at)= MONTH(NOW())) AS upi_introduced'),

                )
                ->get();





        }
        return view("superadmin.upi-fps", compact('results','startDate','endDate'));
    }
    function gunnyduereport(Request $request)
    {


        $startDate= $request->input('startDate');
        $endDate= $request->input('endDate');
        if(!empty($startDate)) {

            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(gunny_dues.consumer_goods), 0) FROM gunny_dues WHERE gunny_dues.region_id = a.id AND gunny_dues.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS consumer_goods'),
                    DB::raw('(SELECT IFNULL(SUM(gunny_dues.amount_received), 0) FROM gunny_dues WHERE gunny_dues.region_id = a.id AND gunny_dues.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS amount_received'),
                    DB::raw('(SELECT consumer_goods_sync_date FROM gunny_dues WHERE gunny_dues.region_id = a.id AND gunny_dues.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'" LIMIT 1) AS consumer_goods_sync_date'),
                )
                ->get();
        }
        else{
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(gunny_dues.consumer_goods), 0) FROM gunny_dues WHERE gunny_dues.region_id = a.id AND MONTH(gunny_dues.created_at) = MONTH(NOW())) AS consumer_goods'),
                    DB::raw('(SELECT IFNULL(SUM(gunny_dues.amount_received), 0) FROM gunny_dues WHERE gunny_dues.region_id = a.id AND MONTH(gunny_dues.created_at)= MONTH(NOW())) AS amount_received'),
                    DB::raw('(SELECT consumer_goods_sync_date FROM gunny_dues WHERE gunny_dues.region_id = a.id AND MONTH(gunny_dues.created_at)= MONTH(NOW()) LIMIT 1) AS consumer_goods_sync_date'),



                )
                ->get();





        }
        return view("superadmin.gunny-due", compact('results','startDate','endDate'));
    }

    function gunnysalereport(Request $request)
    {


        $startDate= $request->input('startDate');
        $endDate= $request->input('endDate');
        if(!empty($startDate)) {

            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(gunny_sales.initial_balance), 0) FROM gunny_sales WHERE gunny_sales.region_id = a.id AND gunny_sales.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS initial_balance'),
                    DB::raw('(SELECT IFNULL(SUM(gunny_sales.curr_month_income), 0) FROM gunny_sales WHERE gunny_sales.region_id = a.id AND  gunny_sales.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS curr_month_income'),
                    DB::raw('(SELECT IFNULL(SUM(gunny_sales.cms_tncsc), 0) FROM gunny_sales WHERE gunny_sales.region_id = a.id AND gunny_sales.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS cms_tncsc'),
                    DB::raw('(SELECT IFNULL(SUM(gunny_sales.cms_mstc), 0) FROM gunny_sales WHERE gunny_sales.region_id = a.id AND gunny_sales.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS cms_mstc'),
                    DB::raw('(SELECT IFNULL(SUM(gunny_sales.cms_ncdfi), 0) FROM gunny_sales WHERE gunny_sales.region_id = a.id AND gunny_sales.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS cms_ncdfi'),
                )
                ->get();
        }
        else{
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(gunny_sales.initial_balance), 0) FROM gunny_sales WHERE gunny_sales.region_id = a.id AND MONTH(gunny_sales.created_at) = MONTH(NOW())) AS initial_balance'),
                    DB::raw('(SELECT IFNULL(SUM(gunny_sales.curr_month_income), 0) FROM gunny_sales WHERE gunny_sales.region_id = a.id AND MONTH(gunny_sales.created_at)= MONTH(NOW())) AS curr_month_income'),
                    DB::raw('(SELECT IFNULL(SUM(gunny_sales.cms_tncsc), 0) FROM gunny_sales WHERE gunny_sales.region_id = a.id AND MONTH(gunny_sales.created_at)= MONTH(NOW())) AS cms_tncsc'),
                    DB::raw('(SELECT IFNULL(SUM(gunny_sales.cms_mstc), 0) FROM gunny_sales WHERE gunny_sales.region_id = a.id AND MONTH(gunny_sales.created_at)= MONTH(NOW())) AS cms_mstc'),
                    DB::raw('(SELECT IFNULL(SUM(gunny_sales.cms_ncdfi), 0) FROM gunny_sales WHERE gunny_sales.region_id = a.id AND MONTH(gunny_sales.created_at)= MONTH(NOW())) AS cms_ncdfi'),

                )
                ->get();





        }
        return view("superadmin.gunny-sale", compact('results','startDate','endDate'));
    }
    function remittancereport(Request $request)
    {


        $startDate= $request->input('startDate');
        $endDate= $request->input('endDate');
        if(!empty($startDate)) {

            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(remittance_to_govt_ac.balance_amt), 0) FROM remittance_to_govt_ac WHERE remittance_to_govt_ac.region_id = a.id AND remittance_to_govt_ac.created_at BETWEEN "'.$startDate.'" AND "'.$endDate.'") AS balance_amt'),
                )
                ->get();
        }
        else{
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(remittance_to_govt_ac.balance_amt), 0) FROM remittance_to_govt_ac WHERE remittance_to_govt_ac.region_id = a.id AND MONTH(remittance_to_govt_ac.created_at) = MONTH(NOW())) AS balance_amt'),

                )
                ->get();





        }
        return view("superadmin.remittance", compact('results','startDate','endDate'));
    }
    function  saltreport(Request $request)
    {


        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        if (!empty($startDate)) {

            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(drpds_salt.dl), 0) FROM drpds_salt WHERE drpds_salt.region_id = a.id AND drpds_salt.created_at BETWEEN "' . $startDate . '" AND "' . $endDate . '") AS dl'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_salt.purchase), 0) FROM drpds_salt WHERE drpds_salt.region_id = a.id AND drpds_salt.created_at BETWEEN "' . $startDate . '" AND "' . $endDate . '") AS purchase'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_salt.sale), 0) FROM drpds_salt WHERE drpds_salt.region_id = a.id AND drpds_salt.created_at BETWEEN "' . $startDate . '" AND "' . $endDate . '") AS sale'),
                )
                ->get();
        } else {
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(drpds_salt.dl), 0) FROM drpds_salt WHERE drpds_salt.region_id = a.id AND MONTH(drpds_salt.created_at) = MONTH(NOW())) AS dl'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_salt.purchase), 0) FROM drpds_salt WHERE drpds_salt.region_id = a.id AND MONTH(drpds_salt.created_at) = MONTH(NOW())) AS purchase'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_salt.sale), 0) FROM drpds_salt WHERE drpds_salt.region_id = a.id AND MONTH(drpds_salt.created_at) = MONTH(NOW())) AS sale'),

                )
                ->get();
        }
        return view("superadmin.saltreport", compact('results', 'startDate', 'endDate'));
    }

    function  duesaltreport(Request $request)
    {


        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        if (!empty($startDate)) {

            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(drpds_duesalt.three), 0) FROM drpds_duesalt WHERE drpds_duesalt.region_id = a.id AND drpds_duesalt.created_at BETWEEN "' . $startDate . '" AND "' . $endDate . '") AS three'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_duesalt.six), 0) FROM drpds_duesalt WHERE drpds_duesalt.region_id = a.id AND drpds_duesalt.created_at BETWEEN "' . $startDate . '" AND "' . $endDate . '") AS six'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_duesalt.abovesix), 0) FROM drpds_duesalt WHERE drpds_duesalt.region_id = a.id AND drpds_duesalt.created_at BETWEEN "' . $startDate . '" AND "' . $endDate . '") AS abovesix'),
                )
                ->get();
        } else {
            $results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(drpds_duesalt.three), 0) FROM drpds_duesalt WHERE drpds_duesalt.region_id = a.id AND MONTH(drpds_duesalt.created_at) = MONTH(NOW())) AS three'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_duesalt.six), 0) FROM drpds_duesalt WHERE drpds_duesalt.region_id = a.id AND MONTH(drpds_duesalt.created_at) = MONTH(NOW())) AS six'),
                    DB::raw('(SELECT IFNULL(SUM(drpds_duesalt.abovesix), 0) FROM drpds_duesalt WHERE drpds_duesalt.region_id = a.id AND MONTH(drpds_duesalt.created_at) = MONTH(NOW())) AS abovesix'),

                )
                ->get();
        }
        return view("superadmin.duesaltreport", compact('results', 'startDate', 'endDate'));
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
            /*$results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.receivedNo), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS noofappreceived'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.sanctionedNo), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS noofappsanctioned'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.applicationpendingno), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id AND users.role = '.$societyTypesFilter.'
                )) AS noofapppending'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.cultivableLand), 0)
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
                ->get();*/

            $results = DB::table('mtr_region as a')
                ->select('a.region_name as Region_Name')
                ->selectRaw('(SELECT IFNULL(SUM(ce.cultivableLand), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id and u.role= '.$societyTypesFilter.' )) AS totalcultivatedarea')
                ->selectRaw('(SELECT IFNULL(SUM(ce.receivedNo), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id and u.role= '.$societyTypesFilter.')) AS noofappreceived')
                ->selectRaw('(SELECT IFNULL(SUM(ce.receivedAmount), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id and u.role= '.$societyTypesFilter.')) AS noofappreceivedAmount')
                ->selectRaw('(SELECT IFNULL(SUM(ce.sanctionedNo), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id and u.role= '.$societyTypesFilter.')) AS noofappsanctioned')
                ->selectRaw('(SELECT IFNULL(SUM(ce.sanctionedAmount), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id and u.role= '.$societyTypesFilter.')) AS noofappsanctionedAmount')
                ->selectRaw('(SELECT IFNULL(SUM(ce.rejectedno), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id and u.role= '.$societyTypesFilter.')) AS noofrejectedno')
                ->selectRaw('(SELECT IFNULL(SUM(ce.applicationpendingno), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id and u.role= '.$societyTypesFilter.')) AS noofapppending')
                ->selectRaw('(SELECT IFNULL(SUM(ce.applicationpendingamount), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id and u.role= '.$societyTypesFilter.')) AS noofappapplicationpendingamount')
                ->get();
        }
        else{

            /*$results = DB::table('mtr_region AS a')
                ->select(
                    'a.region_name AS Region_Name',
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.receivedNo), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS noofappreceived'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.sanctionedNo), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS noofappsanctioned'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.applicationpendingno), 0)
                FROM croploan_entry
                WHERE croploan_entry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS noofapppending'),
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.cultivableLand), 0)
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
                    DB::raw('(SELECT IFNULL(SUM(croploan_entry.outstandingno1), 0)
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
                ->get();*/

            $results = DB::table('mtr_region as a')
                ->select('a.region_name as Region_Name')
                ->selectRaw('(SELECT IFNULL(SUM(ce.cultivableLand), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id)) AS totalcultivatedarea')
                ->selectRaw('(SELECT IFNULL(SUM(ce.receivedNo), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id)) AS noofappreceived')
                ->selectRaw('(SELECT IFNULL(SUM(ce.receivedAmount), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id)) AS noofappreceivedAmount')
                ->selectRaw('(SELECT IFNULL(SUM(ce.sanctionedNo), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id)) AS noofappsanctioned')
                ->selectRaw('(SELECT IFNULL(SUM(ce.sanctionedAmount), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id)) AS noofappsanctionedAmount')
                ->selectRaw('(SELECT IFNULL(SUM(ce.rejectedno), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id)) AS noofrejectedno')
                ->selectRaw('(SELECT IFNULL(SUM(ce.applicationpendingno), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id)) AS noofapppending')
                ->selectRaw('(SELECT IFNULL(SUM(ce.applicationpendingamount), 0) FROM croploan_entry as ce WHERE ce.user_id IN (SELECT u.id FROM users as u WHERE u.region_id = a.id)) AS noofappapplicationpendingamount')
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
