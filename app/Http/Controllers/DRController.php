<?php

namespace App\Http\Controllers;

use App\Helpers\LoanQueryService;
use App\Models\Deposit_outstandings;
use App\Models\Mtr_circle;
use App\Models\Mtr_region;
use App\Models\Mtr_society;
use App\Models\Mtr_societytype;
use Illuminate\Support\Facades\Log;
use Validator;

use App\Models\User;

//loan
use App\Models\Loan;
use App\Models\Loan_trans;
use App\Models\Loan_annual;
use App\Models\Loan_overallot;
use App\Models\Mtr_loan;
use App\Models\Loan_onetimeentry;

//deposit
use App\Models\Deposits;
use App\Models\Mtr_deposits;
use App\Models\Deposit_onetimeentry;


use App\Models\Godowns;

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
use App\Models\Dr;
use App\Models\Dr_dai;
use App\Models\Dr_disqualify;
use App\Models\Dr_eightyone;
use App\Models\Dr_eightytwo;
use App\Models\Dr_seventeena;
use App\Models\Dr_seventeenb;
use App\Models\Dr_surcharge;
use App\Models\Mtr_services;
use App\Models\Services;


use DB;

class DRController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role == 4) {
                return $next($request);
            }
            abort(403);
        });
    }

    function dashboard()
    {
        return view("dashboard");
    }

    function loanlist(Request $request)
    {

        $regions = Mtr_region::where('id',Auth::user()->region_id)->get();
        $circles = Mtr_circle::where('id', Auth::user()->circle_id)->get();
        $societiestypes = Mtr_societytype::all();
        $societies = Mtr_society::all();
        $loantypes=Mtr_loan::all();
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');

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

        $filteredLoans = LoanQueryService::getDRFilteredLoans($request, true);
        $loans = $filteredLoans;
        $secTableRecords = LoanQueryService::getDRFilteredLoans($request);;
        $secTableRecords->groupBy('loandate', 'loantype_id');
        $secTableRecords = $secTableRecords->filter(function ($group) {
            return $group->count() > 1;
        });
        $subloans = $secTableRecords;
        return view("loan.list", compact('loans','regions'  ,'circles', 'societies','societiestypes','loantypes','regionFilter','circleFilter','societyFilter','startDate','endDate','societyTypesFilter','loantypeFilter', 'subloans'));
    }


    function depositlist(Request $request)
    {

        $regions = Mtr_region::where('id',Auth::user()->region_id)->get();
        $circles = Mtr_circle::where('id', Auth::user()->circle_id)->get();
        $societiestypes = Mtr_societytype::all();
        $societies = Mtr_society::all();
        $loantypes=Mtr_loan::all();
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');

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
        $filteredLoans = LoanQueryService::getDRFilteredDeposits($request);
        $deposits = $filteredLoans;
        return view("deposit.list", compact('deposits', 'regions', 'circles', 'societies','societiestypes','regionFilter','circleFilter','societyFilter','startDate','endDate','societyTypesFilter','loantypeFilter'));
    }

    function purchaselist(Request $request)
    {

        $regions = Mtr_region::where('id',Auth::user()->region_id)->get();
        $circles = Mtr_circle::where('id', Auth::user()->circle_id)->get();
        $societiestypes = Mtr_societytype::all();
        $societies = Mtr_society::all();
        $loantypes=Mtr_loan::all();
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');

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
        $filteredLoans = LoanQueryService::getDRFilteredPurchase($request);
        $purchases = $filteredLoans;
        return view("purchase.list", compact('purchases', 'regions', 'circles', 'societies','societiestypes','regionFilter','circleFilter','societyFilter','startDate','endDate','societyTypesFilter','loantypeFilter'));
    }

    function saleslist(Request $request)
    {

        $regions = Mtr_region::where('id',Auth::user()->region_id)->get();
        $circles = Mtr_circle::where('id', Auth::user()->circle_id)->get();
        $societiestypes = Mtr_societytype::all();
        $societies = Mtr_society::all();
        $loantypes=Mtr_loan::all();
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');

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
        $filteredLoans = LoanQueryService::getDRFilteredSales($request);
        $sales = $filteredLoans;
        return view("sales.list", compact('sales', 'regions', 'circles', 'societies','societiestypes','regionFilter','circleFilter','societyFilter','startDate','endDate','societyTypesFilter','loantypeFilter'));
    }

    function godownlist(Request $request)
    {

        $regions = Mtr_region::where('id',Auth::user()->region_id)->get();
        $circles = Mtr_circle::where('id', Auth::user()->circle_id)->get();
        $societiestypes = Mtr_societytype::all();
        $societies = Mtr_society::all();
        $loantypes=Mtr_loan::all();
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');

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
        $filteredLoans = LoanQueryService::getDRFilteredGodown($request);
        $godowns = $filteredLoans;
        return view("godown.list", compact('godowns', 'regions', 'circles', 'societies','societiestypes','regionFilter','circleFilter','societyFilter','startDate','endDate','societyTypesFilter','loantypeFilter'));
    }

    function serviceslist(Request $request)
    {

        $regions = Mtr_region::where('id',Auth::user()->region_id)->get();
        $circles = Mtr_circle::where('id', Auth::user()->circle_id)->get();
        $societiestypes = Mtr_societytype::all();
        $societies = Mtr_society::all();
        $loantypes=Mtr_loan::all();
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');

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
        $filteredLoans = LoanQueryService::getDRFilteredService($request);
        $mtrservices = Mtr_services::all();
        $services = $filteredLoans;
        return view("services.list", compact('services', 'regions', 'circles', 'societies','societiestypes','regionFilter','circleFilter','societyFilter','startDate','endDate','societyTypesFilter','loantypeFilter', 'mtrservices'));

    }

    //Crop target
    function croploanentrycropwiselist(Request $request)
    {

        $croploan_cropwise = Croploan_cropwise::where('croploan_id', $request->route('croploan_id'))->paginate(5);

        return view("croploan.entry.cropwiselist", compact('croploan_cropwise'));
    }

    function croploanlist(Request $request)
    {

        $regions = Mtr_region::where('id',Auth::user()->region_id)->get();
        $circles = Mtr_circle::where('id', Auth::user()->circle_id)->get();
        $societiestypes = Mtr_societytype::all();
        $societies = Mtr_society::all();
        $loantypes=Mtr_loan::all();
        $regionFilter = $request->input('region');
        $circleFilter = $request->input('circle');
        $societyFilter = $request->input('society');
        $endDate = $request->input('endDate');
        $startDate = $request->input('startDate');

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
        $filteredLoans = LoanQueryService::getDRFilteredCropLoan($request);
        $croploan_entry = $filteredLoans;
        return view("croploan.entry.list", compact('croploan_entry', 'regions', 'circles', 'societies','societiestypes','regionFilter','circleFilter','societyFilter','startDate','endDate','societyTypesFilter','loantypeFilter'));

        //  $croploan_entry = Croploan_entry::where('user_id', Auth::user()->id)->paginate(5);

//        $croploan_entry = Croploan_entry::select('*')
//            ->whereIn('user_id', function ($query) {
//                $query->select('id')->from('users')->where('circle_id', Auth::user()->circle_id);
//            })
//            ->paginate(5);
//
//        return view("croploan.entry.list", compact('croploan_entry'));
    }

    function eightyoneadd()
    {

        $dr = Dr_eightyone::select('*')->paginate(5);
        return view("dr.eightyone.add", compact('dr'));
    }
    function eightyonelist()
    {

        $dr = Dr_eightyone::select('*')->paginate(5);
        return view("dr.eightyone.list", compact('dr'));
    }


    function eightyonestore(Request $request)
    {
        // Validate the form data
        $request->validate([

            'ob_eighty_one' => 'required|integer',
            'ordered_this_month_eighty_one' => 'required|integer',
            'total_ob_ordered_eighty_one' => 'required|integer',
            'completed_this_month_eighty_one' => 'required|integer',
            'pending_within_3_months_eighty_one' => 'required|integer',
            'pending_in_3_to_6_months_eighty_one' => 'required|integer',
            'pending_above_6_months_eighty_one' => 'required|integer',
            'total_pending_eighty_one' => 'required|integer',
            'pending_percentage_eighty_one' => 'required|numeric',
        ]);

        // Create a new instance of the model and populate it with the form data
        $eightyone = new Dr_eightyone();
        $eightyone->ob_eighty_one = $request->input('ob_eighty_one');
        $eightyone->ordered_this_month_eighty_one = $request->input('ordered_this_month_eighty_one');
        $eightyone->total_ob_ordered_eighty_one = $request->input('total_ob_ordered_eighty_one');
        $eightyone->completed_this_month_eighty_one = $request->input('completed_this_month_eighty_one');
        $eightyone->pending_within_3_months_eighty_one = $request->input('pending_within_3_months_eighty_one');
        $eightyone->pending_in_3_to_6_months_eighty_one = $request->input('pending_in_3_to_6_months_eighty_one');
        $eightyone->pending_above_6_months_eighty_one = $request->input('pending_above_6_months_eighty_one');
        $eightyone->total_pending_eighty_one = $request->input('total_pending_eighty_one');
        $eightyone->pending_percentage_eighty_one = $request->input('pending_percentage_eighty_one');

        $eightyone->save();

        return redirect('/dr/eightyone/list')->with('status', '81-Inquiry added successfully');
    }

    function eightytwoadd()
    {

        $dr = Dr_eightytwo::select('*')->paginate(5);
        return view("dr.eightytwo.add", compact('dr'));
    }
    function eightytwolist()
    {

        $dr = Dr_eightytwo::select('*')->paginate(5);
        return view("dr.eightytwo.list", compact('dr'));
    }

    function eightytwostore(Request $request)
    {
        // Validate the form data
        $request->validate([

            'ob_eighty_two' => 'required|integer',
            'ordered_this_month_eighty_two' => 'required|integer',
            'total_ob_ordered_eighty_two' => 'required|integer',
            'completed_this_month_eighty_two' => 'required|integer',
            'pending_within_3_months_eighty_two' => 'required|integer',
            'pending_in_3_to_6_months_eighty_two' => 'required|integer',
            'pending_above_6_months_eighty_two' => 'required|integer',
            'total_pending_eighty_two' => 'required|integer',
            'pending_percentage_eighty_two' => 'required|numeric',
        ]);

        // Create a new instance of the model and populate it with the form data
        $eightytwo = new Dr_eightytwo();
        $eightytwo->ob_eighty_two = $request->input('ob_eighty_two');
        $eightytwo->ordered_this_month_eighty_two = $request->input('ordered_this_month_eighty_two');
        $eightytwo->total_ob_ordered_eighty_two = $request->input('total_ob_ordered_eighty_two');
        $eightytwo->completed_this_month_eighty_two = $request->input('completed_this_month_eighty_two');
        $eightytwo->pending_within_3_months_eighty_two = $request->input('pending_within_3_months_eighty_two');
        $eightytwo->pending_in_3_to_6_months_eighty_two = $request->input('pending_in_3_to_6_months_eighty_two');
        $eightytwo->pending_above_6_months_eighty_two = $request->input('pending_above_6_months_eighty_two');
        $eightytwo->total_pending_eighty_two = $request->input('total_pending_eighty_two');
        $eightytwo->pending_percentage_eighty_two = $request->input('pending_percentage_eighty_two');

        $eightytwo->save();

        return redirect('/dr/eightytwo/list')->with('status', '82-Inspection added successfully');
    }

    function seventeenaadd()
    {

        $dr = Dr_seventeena::select('*')->paginate(5);
        return view("dr.seventeena.add", compact('dr'));
    }
    function seventeenalist()
    {

        $dr = Dr_seventeena::select('*')->paginate(5);
        return view("dr.seventeena.list", compact('dr'));
    }

    function seventeenastore(Request $request)
    {
        $request->validate([
            'disciplinary_ob_seventeena' => 'required|integer',
            'initiated_during_month_seventeena' => 'required|integer',
            'disciplinary_total_seventeena' => 'required|integer',
            'disposed_this_month_seventeena' => 'required|integer',
            'disciplinary_pending_seventeena' => 'required|integer',
            'disciplinary_pending_percentage_seventeena' => 'required|numeric',
            'disciplinary_ob_seventeenb' => 'required|integer',
            'initiated_during_month_seventeenb' => 'required|integer',
            'disciplinary_total_seventeenb' => 'required|numeric',
            'disposed_this_month_seventeenb' => 'required|integer',
            'disciplinary_pending_seventeenb' => 'required|numeric',
            'disciplinary_pending_percentage_seventeenb' => 'required|numeric',
        ]);

        $seventeena = new Dr_seventeena();
        $seventeena->disciplinary_ob_seventeena = $request->input('disciplinary_ob_seventeena');
        $seventeena->initiated_during_month_seventeena = $request->input('initiated_during_month_seventeena');
        $seventeena->disciplinary_total_seventeena = $request->input('disciplinary_total_seventeena');
        $seventeena->disposed_this_month_seventeena = $request->input('disposed_this_month_seventeena');
        $seventeena->disciplinary_pending_seventeena = $request->input('disciplinary_pending_seventeena');
        $seventeena->disciplinary_pending_percentage_seventeena = $request->input('disciplinary_pending_percentage_seventeena');
        $seventeena->disciplinary_ob_seventeenb = $request->input('disciplinary_ob_seventeenb');
        $seventeena->initiated_during_month_seventeenb = $request->input('initiated_during_month_seventeenb');
        $seventeena->disciplinary_total_seventeenb = $request->input('disciplinary_total_seventeenb');
        $seventeena->disposed_this_month_seventeenb = $request->input('disposed_this_month_seventeenb');
        $seventeena->disciplinary_pending_seventeenb = $request->input('disciplinary_pending_seventeenb');
        $seventeena->disciplinary_pending_percentage_seventeenb = $request->input('disciplinary_pending_percentage_seventeenb');
        $seventeena->save();

        return redirect('/dr/seventeena/list')->with('status', '17(A) & 17(B) added successfully');
    }


    function daiadd()
    {

        $dr = Dr_dai::select('*')->paginate(5);
        return view("dr.dai.add", compact('dr'));
    }
    function dailist()
    {

        $dr = Dr_dai::select('*')->paginate(5);
        return view("dr.dai.list", compact('dr'));
    }

    function daistore(Request $request)
    {
        $request->validate([
            'ob' => 'required|integer',
            'recommended_action' => 'required|string|max:255',
            'action_taken' => 'required|string|max:255',
            'disposal' => 'required|string|max:255',
            'percentage_of_disposal' => 'required|numeric',
        ]);


        $seventeena = new Dr_dai();
        $seventeena->ob = $request->input('ob');
        $seventeena->recommended_action = $request->input('recommended_action');
        $seventeena->action_taken = $request->input('action_taken');
        $seventeena->disposal = $request->input('disposal');
        $seventeena->percentage_of_disposal = $request->input('percentage_of_disposal');
        $seventeena->save();



        return redirect('/dr/dai/list')->with('status', 'Disciplinary Action Institution added successfully');
    }


    function surchargeadd()
    {

        $dr = Dr_surcharge::select('*')->paginate(5);
        return view("dr.surcharge.add", compact('dr'));
    }
    function surchargelist()
    {

        $dr = Dr_surcharge::select('*')->paginate(5);
        return view("dr.surcharge.list", compact('dr'));
    }

    function surchargestore(Request $request)
    {
        $request->validate([
            'surcharge_order_issued_number' => 'required|string|max:255',
            'surcharge_issued_amount' => 'required|numeric',
            'numbers_collected_during_month' => 'required|integer',
            'collected_amount' => 'required|numeric',
            'balance_numbers' => 'required|integer',
            'balance_amount' => 'required|numeric',
            'percentage_of_collection' => 'required|numeric',
        ]);

        // Create a new instance of the SurchargeData model and populate it with the form data
        $surchargeData = new Dr_surcharge();
        $surchargeData->surcharge_order_issued_number = $request->input('surcharge_order_issued_number');
        $surchargeData->surcharge_issued_amount = $request->input('surcharge_issued_amount');
        $surchargeData->numbers_collected_during_month = $request->input('numbers_collected_during_month');
        $surchargeData->collected_amount = $request->input('collected_amount');
        $surchargeData->balance_numbers = $request->input('balance_numbers');
        $surchargeData->balance_amount = $request->input('balance_amount');
        $surchargeData->percentage_of_collection = $request->input('percentage_of_collection');
        $surchargeData->save();

        return redirect('/dr/surcharge/list')->with('87- Surcharge Data added successfully');
    }


    function disqualifyadd()
    {

        $dr = Dr_disqualify::select('*')->paginate(5);
        return view("dr.disqualify.add", compact('dr'));
    }
    function disqualifylist()
    {

        $dr = Dr_disqualify::select('*')->paginate(5);
        return view("dr.disqualify.list", compact('dr'));
    }

    function disqualifystore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'societies_ob' => 'required|integer',
            'board_of_directors_ob' => 'required|integer',
            'societies_im' => 'required|integer',
            'board_of_directors_im' => 'required|integer',
            'societies_total' => 'required|integer',
            'board_of_directors_total' => 'required|integer',
            'societies_dam' => 'required|integer',
            'board_of_directors_dam' => 'required|integer',
            'societies_pam' => 'required|integer',
            'board_of_directors_pam' => 'required|integer',
            'societies_pp' => 'required|integer',
            'board_of_directors_pp' => 'required|integer',
        ]);

        // Create a new instance of the model and populate it with the form data
        $societiesBoardDirectors = new Dr_disqualify();
        $societiesBoardDirectors->societies_ob = $request->input('societies_ob');
        $societiesBoardDirectors->board_of_directors_ob = $request->input('board_of_directors_ob');
        $societiesBoardDirectors->societies_im = $request->input('societies_im');
        $societiesBoardDirectors->board_of_directors_im = $request->input('board_of_directors_im');
        $societiesBoardDirectors->societies_total = $request->input('societies_total');
        $societiesBoardDirectors->board_of_directors_total = $request->input('board_of_directors_total');
        $societiesBoardDirectors->societies_dam = $request->input('societies_dam');
        $societiesBoardDirectors->board_of_directors_dam = $request->input('board_of_directors_dam');
        $societiesBoardDirectors->societies_pam = $request->input('societies_pam');
        $societiesBoardDirectors->board_of_directors_pam = $request->input('board_of_directors_pam');
        $societiesBoardDirectors->societies_pp = $request->input('societies_pp');
        $societiesBoardDirectors->board_of_directors_pp = $request->input('board_of_directors_pp');

        $societiesBoardDirectors->save();

        return redirect('/dr/disqualify/list')->with('status', '36 Disqualification added successfully');
    }
}
