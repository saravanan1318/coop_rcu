<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    function loanreport(){


        $mtr_loans = Mtr_loan::all();


        $finalarr = array();

        foreach($mtr_loans as $mtr_loan){


            $date = date("Y-m-d");

            $loan_onetimeentry = Loan_onetimeentry::where('loan_id', $mtr_loan->id)->first();

            $othersissuedtotalno = Loan_issues::where('loan_id', $mtr_loan->id)->where('loan_id', $date)->sum('othersno');
            $othersissuedtotalamount = Loan_issues::where('loan_id', $mtr_loan->id)->where('loan_id', $date)->sum('othersamount');
            $scstissuedtotalno = Loan_issues::where('loan_id', $mtr_loan->id)->where('loan_id', $date)->sum('scstno');
            $scstissuedtotalamount = Loan_issues::where('loan_id', $mtr_loan->id)->where('loan_id', $date)->sum('scstamount');


            $otherscollectedtotalno = Loan_collection::where('loan_id', $mtr_loan->id)->where('collectiondate', $date)->sum('othersno');
            $otherscollectedtotalamount = Loan_collection::where('loan_id', $mtr_loan->id)->where('collectiondate', $date)->sum('othersamount');
            $scstcollectedtotalno = Loan_collection::where('loan_id', $mtr_loan->id)->where('collectiondate', $date)->sum('scstno');
            $scstcollectedtotalamount = Loan_collection::where('loan_id', $mtr_loan->id)->where('collectiondate', $date)->sum('scstamount');

            $collectedtotalno = $otherscollectedtotalno +  $scstcollectedtotalno;
            $collectedtotalamount = $otherscollectedtotalamount +  $scstcollectedtotalamount;

            $overall_outstanding =  0;
            $current_outstanding =  0;
            $current_year =  0;
            $annual_target =  0;

            if(!is_null($loan_onetimeentry)){
                
                $overall_outstanding =  $loan_onetimeentry->overall_outstanding;
                $current_outstanding =  $loan_onetimeentry->current_outstanding;
                $current_year =  $loan_onetimeentry->current_year;
                $annual_target =  $loan_onetimeentry->annual_target;

            }

            $indarr = array();

            $indarr['date'] =  $date;
            $indarr['loantype'] = $mtr_loan->loantype;
            $indarr['overall_outstanding'] = $overall_outstanding;
            $indarr['current_outstanding'] = $current_outstanding;
            $indarr['current_year'] = $current_year;
            $indarr['annual_target'] = $annual_target;
            $indarr['othersissuedtotalno'] = $othersissuedtotalno;
            $indarr['othersissuedtotalamount'] = $othersissuedtotalamount;
            $indarr['scstissuedtotalno'] = $scstissuedtotalno;
            $indarr['scstissuedtotalamount'] = $scstissuedtotalamount;
            $indarr['collectedtotalno'] = $collectedtotalno;
            $indarr['collectedtotalamount'] = $collectedtotalamount;

            array_push( $finalarr, $indarr);

        }

        return view("superadmin.loanreport",compact('finalarr'));
    }

}
