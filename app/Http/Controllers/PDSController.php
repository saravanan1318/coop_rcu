<?php

namespace App\Http\Controllers;

use App\Models\Mtr_region;
use App\Models\Pds_gunny_dues;
use App\Models\Pds_gunny_sales;
use App\Models\Pds_margin_money;
use App\Models\Pds_mino_millet;
use App\Models\Pds_palm_jaggery;
use App\Models\Pds_remittance_to_govt_ac;
use App\Models\Pds_upi_fps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PDSController extends Controller
{

    function palmJaggeryAdd(Request $request)
    {
        $mtr_regions = Mtr_region::all();
        return view("pds.palmjaggery.add", compact('mtr_regions'));
    }

    function palmJaggeryStore(Request $request)
    {

        $model = new Pds_palm_jaggery();
        $model->user_id = Auth::user()->id;
//        $model->region_id = $request->region;
        $model->region_id = Auth::user()->region_id;
        $model->fin_month = $request->fin_month;
        $model->target = $request->target;
        $model->achievement = $request->achievement;
        $model->pending_target = $request->pending_target;
        $model->save();

        return redirect('/drpds/palm-jaggery')->with('status', 'New Record Added Successfully');
    }

    function palmJaggeryList(Request $request)
    {
        $alldata = Pds_palm_jaggery::select('*')->with('region')->get();
        return view("pds.palmjaggery.list", compact('alldata'));
    }

    function minoMilletAdd(Request $request)
    {
        $mtr_regions = Mtr_region::all();
        return view("pds.minomillet.add", compact('mtr_regions'));
    }

    function minoMilletStore(Request $request)
    {
        $arraycount = count($request->small_grain_type);
        for ($i = 0; $i < $arraycount; $i++) {
            $model = new Pds_mino_millet;
            $model->user_id = Auth::user()->id;
            $model->fin_month = $request->fin_month;
            $model->fps_name = $request->fps_name;
            $model->purchase_company_name = $request->purchase_company_name;
            $model->small_grain_type = $request->small_grain_type[$i];
//            $model->region_id = $request->region[$i];
            $model->region_id = Auth::user()->region_id;
            $model->quantity_purchased = $request->quantity_purchased[$i];
            $model->quantity_sold = $request->quantity_sold[$i];
            $model->sales_amount = $request->sales_amount[$i];
            $model->save();
        }

        return redirect('/drpds/mino-millet')->with('status', 'New Record Added Successfully');
    }

    function minoMilletList(Request $request)
    {
        $alldata = Pds_mino_millet::select('*')->with('region')->get();
        return view("pds.minomillet.list", compact('alldata'));
    }

    function upiFbsAdd(Request $request)
    {
        $mtr_regions = Mtr_region::all();
        return view("pds.upifps.add", compact('mtr_regions'));
    }

    function upiFbsStore(Request $request)
    {

        $model = new Pds_upi_fps();
        $model->user_id = Auth::user()->id;
//        $model->region_id = $request->region;
        $model->region_id = Auth::user()->region_id;
        $model->fps_fulltime = $request->fps_fulltime;
        $model->fps_parttime = $request->fps_parttime;
        $model->fps_total = $request->fps_total;
        $model->upi_introduced = $request->upi_introduced;
        $model->upi_tobe_introduced = $request->upi_tobe_introduced;
        $model->upi_introduced_per = $request->upi_introduced_per;
        $model->save();

        return redirect('/drpds/upi-fps')->with('status', 'New Record Added Successfully');
    }

    function upiFbsList(Request $request)
    {
        $alldata = Pds_upi_fps::select('*')->with('region')->get();
        return view("pds.upifps.list", compact('alldata'));
    }

    function marginMoneyAdd(Request $request)
    {
        $mtr_regions = Mtr_region::all();
        return view("pds.marginmoney.add", compact('mtr_regions'));
    }

    function marginMoneyStore(Request $request)
    {

        $model = new Pds_margin_money();
        $model->user_id = Auth::user()->id;
//        $model->region_id = $request->region;
        $model->region_id = Auth::user()->region_id;
        $model->price_diff_due_amount = $request->price_diff_due_amount;
        $model->margin_supp_free_cost = $request->margin_supp_free_cost;
        $model->margin_pmgkay_scheme_a = $request->margin_pmgkay_scheme_a;
        $model->margin_amt_due_cashew = $request->margin_amt_due_cashew;
        $model->margin_pmgkay_scheme_b = $request->margin_pmgkay_scheme_b;
        $model->diff_to_be_paid = $request->diff_to_be_paid;
        $model->additional = $request->additional;
        $model->consumer_goods_sync_date = $request->consumer_goods_sync_date;
        $model->save();

        return redirect('/drpds/margin-money')->with('status', 'New Record Added Successfully');
    }

    function marginMoneyList(Request $request)
    {
        $alldata = Pds_margin_money::select('*')->with('region')->get();
        return view("pds.marginmoney.list", compact('alldata'));
    }

    function gunnyDuesAdd(Request $request)
    {
        $mtr_regions = Mtr_region::all();
        return view("pds.gunnydues.add", compact('mtr_regions'));
    }

    function gunnyDuesStore(Request $request)
    {

        $model = new Pds_gunny_dues();
        $model->user_id = Auth::user()->id;
//        $model->region_id = $request->region;
        $model->region_id = Auth::user()->region_id;
        $model->consumer_goods = $request->consumer_goods;
        $model->amount_received = $request->amount_received;
        $model->due_on = $request->due_on;
        $model->consumer_goods_sync_date = $request->consumer_goods_sync_date;
        $model->save();

        return redirect('/drpds/gunny-dues')->with('status', 'New Record Added Successfully');
    }

    function gunnyDuesList(Request $request)
    {
        $alldata = Pds_gunny_dues::select('*')->with('region')->get();
        return view("pds.gunnydues.list", compact('alldata'));
    }

    function gunnySalesAdd(Request $request)
    {
        $mtr_regions = Mtr_region::all();
        return view("pds.gunnysales.add", compact('mtr_regions'));
    }

    function gunnySalesStore(Request $request)
    {

        $model = new Pds_gunny_sales();
        $model->user_id = Auth::user()->id;
//        $model->region_id = $request->region;
        $model->region_id = Auth::user()->region_id;
        $model->fin_month = $request->fin_month;
        $model->initial_balance = $request->initial_balance;
        $model->curr_month_income = $request->curr_month_income;
        $model->total = $request->total;
        $model->cms_tncsc = $request->cms_tncsc;
        $model->cms_mstc = $request->cms_mstc;
        $model->cms_ncdfi = $request->cms_ncdfi;
        $model->cms_total = $request->cms_total;
        $model->final_balance = $request->final_balance;
        $model->save();

        return redirect('/drpds/gunny-sales')->with('status', 'New Record Added Successfully');
    }

    function gunnySalesList(Request $request)
    {
        $alldata = Pds_gunny_sales::select('*')->with('region')->get();
        return view("pds.gunnysales.list", compact('alldata'));
    }

    function remittanceToGovtAcAdd(Request $request)
    {
        $mtr_regions = Mtr_region::all();
        return view("pds.remittancetogovtac.add", compact('mtr_regions'));
    }

    function remittanceToGovtAcStore(Request $request)
    {

        $model = new Pds_remittance_to_govt_ac();
        $model->user_id = Auth::user()->id;
//        $model->region_id = $request->region;
        $model->region_id = Auth::user()->region_id;
        $model->fin_month = $request->fin_month;
        $model->balance_amt = $request->balance_amt;
        $model->save();

        return redirect('/drpds/remittance-to-govt-ac')->with('status', 'New Record Added Successfully');
    }

    function remittanceToGovtAcList(Request $request)
    {
        $alldata = Pds_remittance_to_govt_ac::select('*')->with('region')->get();
        return view("pds.remittancetogovtac.list", compact('alldata'));
    }
}
