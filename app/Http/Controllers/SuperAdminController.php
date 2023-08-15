<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Loan_collection;
use App\Models\Loan_issues;
use App\Models\Loan_overallot;
use App\Models\Mtr_loan;
use App\Models\Loan_onetimeentry;

class SuperAdminController extends Controller
{
    //

    function dashboard(){
        return view("superadmin.dashboard");
    }

    function loanreport(Request $request){


        $loanreportdate = $request->loanreportdate;

        if(!empty($loanreportdate)){
            $loanreportdate = $request->loanreportdate;
        }else{
            $loanreportdate = date("Y-m-d");
        }

        $mtr_loans = Mtr_loan::all();


        $finalarr = array();

        foreach($mtr_loans as $mtr_loan){


            $loan_onetimeentry = Loan_onetimeentry::where('loan_id', $mtr_loan->id)->first();

            $issuedtotal = DB::table('loan_issues')->select(DB::raw('SUM(totalamount) as totalamount'), DB::raw('SUM(totalno) as totalno'), DB::raw('SUM(scstno) as scstno'),DB::raw('SUM(scstamount) as scstamount'))->where('loan_id', $mtr_loan->id)->where('issuedate', $loanreportdate)->get();
            $collectedtotal = DB::table('loan_collection')->select(DB::raw('SUM(totalamount) as totalamount'), DB::raw('SUM(totalno) as totalno'))->where('loan_id', $mtr_loan->id)->where('collectiondate', $loanreportdate)->get();

            $overalloutstandissued = Loan_issues::where('loan_id', $mtr_loan->id)->sum('totalamount');
            $currentoveralloutstandissued = Loan_issues::where('loan_id', $mtr_loan->id)->where('issuedate','>=', date("Y-m-01"))->sum('totalamount');
            
            $overalloutstandcollected = Loan_collection::where('loan_id', $mtr_loan->id)->sum('totalamount');
            $currentoveralloutstandcollected = Loan_collection::where('loan_id', $mtr_loan->id)->where('collectiondate','>=', date("Y-m-01"))->sum('totalamount');
            
            
            $overall_outstanding =  0;
            $current_outstanding =  0;
            $current_year =  0;
            $annual_target =  0;
            $annual_targetcalc =  1;

            if(!is_null($loan_onetimeentry)){
                
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
           
            $achievedpercentage = ($totalamount/$annual_targetcalc)*100;

            $indarr = array();

            $indarr['date'] =  date("d-m-Y",strtotime($loanreportdate));;
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

            array_push( $finalarr, $indarr);

        }
        

        return view("superadmin.loanreport",compact('finalarr','loanreportdate'));
    }

    function IND_money_format($number){
        $decimal = (string)($number - floor($number));
        $money = floor($number);
        $length = strlen($money);
        $delimiter = '';
        $money = strrev($money);

        for($i=0;$i<$length;$i++){
            if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$length){
                $delimiter .=',';
            }
            $delimiter .=$money[$i];
        }

        $result = strrev($delimiter);
        $decimal = preg_replace("/0\./i", ".", $decimal);
        $decimal = substr($decimal, 0, 3);

        if( $decimal != '0'){
            $result = $result.$decimal;
        }

        return $result;
    }
}
