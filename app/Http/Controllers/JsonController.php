<?php

namespace App\Http\Controllers;

use App\Models\Mtr_circle;
use App\Models\Mtr_loan;
use App\Models\Mtr_region;
use App\Models\Mtr_society;
use App\Models\Mtr_societytype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class JsonController extends Controller
{
    function loanreportjson(Request $request)
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
                        DB::raw('(SELECT CAST(IFNULL(SUM(loan_onetimeentry.annual_target), 0) AS UNSIGNED)
                FROM loan_onetimeentry
                WHERE loan_onetimeentry.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS Loan_Target_2023_24'),
                        DB::raw('(SELECT CAST(IFNULL(SUM(loan.disbursedamount), 0) AS UNSIGNED)
                FROM loan
                WHERE loan.user_id IN (
                    SELECT users.id FROM users
                    WHERE users.region_id = a.id
                )) AS Disbursed_Amount'),
                    )
                    ->get();
            }


//        $results = DB::select('SELECT * FROM view_regionwise_credit_and_deopsit');

            return view("superadmin.loanreportjson", compact('loanreportdate', 'results', 'societiestypes', 'societyTypesFilter', 'regions', 'regionFilter', 'circles', 'circleFilter', 'loantypes', 'startDate', 'endDate', 'societyTypesFilter', 'loantypeFilter'));
        }
    }
}
