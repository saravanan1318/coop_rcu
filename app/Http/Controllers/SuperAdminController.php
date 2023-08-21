<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;


use App\Models\Loan_collection;
use App\Models\Loan_issues;
use App\Models\Loan_overallot;
use App\Models\Mtr_loan;
use App\Models\Loan_onetimeentry;
use App\Models\Deposit_onetimeentry;
use App\Models\Mtr_deposits;
use App\Models\Deposits;
use App\Models\Mtr_region;
use App\Models\Mtr_circle;
use App\Models\Mtr_society;
use App\Models\Mtr_role;
use App\Models\User;

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


    function depositreport(Request $request){


        $depositreportdate = $request->depositreportdate;

        if(!empty($depositreportdate)){
            $depositreportdate = $request->depositreportdate;
        }else{
            $depositreportdate = date("Y-m-d");
        }

        $mtr_deposits = Mtr_deposits::all();


        $finalarr = array();

        foreach($mtr_deposits as $mtr_deposit){


            $deposit_onetimeentry = Deposit_onetimeentry::where('deposit_id', $mtr_deposit->id)->first();

            $receivedtotal = DB::table('deposits')->select(DB::raw('SUM(recievedno) as recievedno'), DB::raw('SUM(recievedamount) as recievedamount'), DB::raw('SUM(closedno) as closedno'), DB::raw('SUM(closedamount) as closedamount'))->where('deposit_id', $mtr_deposit->id)->where('depositdate', $depositreportdate)->get();

            $overalloutstandreceived = Deposits::where('deposit_id', $mtr_deposit->id)->sum('recievedamount');
            $currentoveralloutstandreceived = Deposits::where('deposit_id', $mtr_deposit->id)->where('depositdate','>=', date("Y-m-01"))->sum('recievedamount');
            
            $overalloutstandclosed = Deposits::where('deposit_id', $mtr_deposit->id)->sum('closedamount');
            $currentoveralloutstandclosed = Deposits::where('deposit_id', $mtr_deposit->id)->where('depositdate','>=', date("Y-m-01"))->sum('closedamount');
            
        
            $overall_outstanding =  0;
            $current_outstanding =  0;
            $current_year =  0;
            $annual_target =  0;
            $annual_targetcalc =  1;

            if(!is_null($deposit_onetimeentry)){
                
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
           
            $achievedpercentage = ($receivedamount/$annual_targetcalc)*100;

            $indarr = array();

            $indarr['date'] =  date("d-m-Y",strtotime($depositreportdate));;
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

            array_push( $finalarr, $indarr);

        }
        

        return view("superadmin.depositreport",compact('finalarr','depositreportdate'));
    }

    function userslist(){

        $users = User::all();

        return view("superadmin.userslist", compact('users'));
    }

    function useradd(){

        $mtr_region = Mtr_region::all();
        $mtr_role = Mtr_role::all();
        return view("superadmin.useradd", compact('mtr_region','mtr_role'));
    }

    function userstore(Request $request){

        
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


    function fetchcircle(Request $request){

        $cirlces = Mtr_circle::where('region_id',$request->region_id)->where('status', 1)->get();
        return response()->json(array('data'=> $cirlces), 200);
    }


    function fetchsociety(Request $request){

        $society = Mtr_society::where('circle_id',$request->circle_id)->where('region_id',$request->region_id)->where('status', 1)->get();
        return response()->json(array('data'=> $society), 200);
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
