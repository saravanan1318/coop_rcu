<?php

namespace App\Http\Controllers;

use App\Helpers\LoanQueryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Excel;

use App\Models\Mtr_region;
use App\Models\Mtr_circle;
use App\Models\Mtr_districts;
use App\Models\Mtr_society;
use App\Models\Mtr_societytype;
use App\Models\Mtr_blockpanchayat;
use App\Models\Mtr_villagepanchayat;
use App\Models\Mtr_crop;
use App\Models\Mtr_deposits;
use App\Models\Mtr_loan;
use App\Models\Mtr_purchase;
use App\Models\Mtr_Sale;
use App\Models\Mtr_services;
use App\Models\Mtr_minomillet;
use App\Models\Mtr_role;
use App\Models\User;

use App\Models\Godowns;

use App\Exports\LoanExport;
use App\Models\Croploan_entry;
use App\Models\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class MasterController extends Controller
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

    // Region
    function region(Request $request) {
        $regions = DB::table('mtr_region')->get();
        $title = "List of Regions";
        return view("superadmin.master",compact("regions","title"));
    }
    function regionAdd(Request $request) {
        $title = "Add Region";
        return view("superadmin.regionedit")->with('title', $title);
    }
    function regionStore(Request $request) {
        $region = new Mtr_region;
        $region->region_name = $request->region;
        $region->region_code = $request->code;
        $region->save();

        return redirect('/superadmin/regionmaster')->with('success', 'Region Added Successfully...');
    }
    function regionEdit(Request $request, $id) {
        $region = Mtr_region::find($id);
        if(empty($region)) {
            return redirect('/superadmin/regionmaster')->with('warning', 'Region does not exist!');
        }
        $title = "Edit Regions";
        return view("superadmin.regionedit",compact("region","title"));

    }
    function regionUpdate(Request $request, $id) {
        $region = Mtr_region::find($id);
        if(empty($region)) {
            return redirect('/superadmin/regionmaster')->with('warning', 'Region does not exist!');
        }
        $region->region_name = $request->region;
        $region->region_code = $request->code;
        $region->update();

        return redirect('/superadmin/regionmaster')->with('success', 'Region Updated Successfully...');
    }

    // Circle
    function circle(Request $request) {
        $circles = DB::table('mtr_circle')
            ->leftJoin('mtr_region', 'mtr_region.id', 'mtr_circle.region_id')
            ->select('mtr_circle.*','mtr_region.region_name')
            ->get();
        $title = "List of Circles";
        return view("superadmin.master",compact("circles","title"));
    }
    function circleAdd(Request $request) {
        $regions = DB::table('mtr_region')->get();
        $title = "Add Circle";
        return view("superadmin.circleedit",compact("regions","title"));
    }
    function circleStore(Request $request) {
        $circle = new Mtr_circle;
        $circle->region_id = $request->region;
        $circle->circle_name = $request->circle;
        $circle->save();
        return redirect('/superadmin/circlemaster')->with('success', 'Circle Added Successfully...');
    }
    function circleEdit(Request $request, $id) {
        $regions = DB::table('mtr_region')->get();
        $circle = DB::table('mtr_circle')
            ->leftJoin('mtr_region', 'mtr_region.id', '=', 'mtr_circle.region_id')
            ->where('mtr_circle.id',$id)->first();
        if(empty($circle)) {
            return redirect('/superadmin/circlemaster')->with('warning', 'Circle does not exist!');
        }
        $title = "Edit Circle";
        return view("superadmin.circleedit",compact("circle","regions","title"));
    }
    function circleUpdate(Request $request, $id) {
        $circle = Mtr_circle::find($id);
        if(empty($circle)) {
            return redirect('/superadmin/circlemaster')->with('warning', 'Circle does not exist!');
        }
        $circle->region_id = $request->region;
        $circle->circle_name = $request->circle;
        $circle->update();
        return redirect('/superadmin/circlemaster')->with('success', 'Circle Updated Successfully...');
    }

    // Society
    function society(Request $request) {
        $societies = DB::table('mtr_society')
            ->leftJoin('mtr_region', 'mtr_region.id', 'mtr_society.region_id')
            ->leftJoin('mtr_circle', 'mtr_circle.id', 'mtr_society.circle_id')
            ->leftJoin('mtr_societytype', 'mtr_societytype.id', 'mtr_society.societytype_id')
            ->select('mtr_society.id','mtr_region.region_name','mtr_circle.circle_name','mtr_societytype.societytype','mtr_society.society_name')
            ->get();
        $title = "List of Societies";
        return view("superadmin.master",compact("societies","title"));
    }
    function societyAdd(Request $request) {
        $regions = DB::table('mtr_region')->get();
        $circles = DB::table('mtr_circle')->get();
        $societytypes = DB::table('mtr_societytype')->get();
        $title = "Add Society";
        return view("superadmin.societyedit",compact("regions","circles","societytypes","title"));
    }
    function societyStore(Request $request) {
        $society = new Mtr_society;
        $society->region_id = $request->region;
        $society->circle_id = $request->circle;
        $society->societytype_id = $request->societytype;
        $society->society_name = $request->society;
        $society->registration_no = $request->regno;
        $society->staff_name = $request->staff_name;
        $society->designation = $request->designation;
        $society->mobile_no = $request->mobile_no;
        $society->address = $request->address;
        $society->pincode = $request->pincode;
        $society->email = $request->email;
        $society->save();
        return redirect('/superadmin/societymaster')->with('success', 'Society Added Successfully...');
    }
    function societyEdit(Request $request, $id) {
        $society = DB::table('mtr_society')
            ->leftJoin('mtr_region', 'mtr_region.id', 'mtr_society.region_id')
            ->leftJoin('mtr_circle', 'mtr_circle.id', 'mtr_society.circle_id')
            ->leftJoin('mtr_societytype', 'mtr_societytype.id', 'mtr_society.societytype_id')
            ->select('mtr_society.*','mtr_region.region_name','mtr_circle.circle_name','mtr_societytype.societytype')
            ->where('mtr_society.id',$id)
            ->first();
        if(empty($society)) {
            return redirect('/superadmin/societymaster')->with('warning', 'Society does not exist!');
        }
        $regions = DB::table('mtr_region')->get();
        $circles = DB::table('mtr_circle')->get();
        $societytypes = DB::table('mtr_societytype')->get();
        $title = "Edit Society";
        return view("superadmin.societyedit",compact("society","regions","circles","societytypes","title"));
    }
    function societyUpdate(Request $request, $id) {
        $society = Mtr_society::find($id);
        if(empty($society)) {
            return redirect('/superadmin/societymaster')->with('warning', 'Society does not exist!');
        }
        $society->region_id = $request->region;
        $society->circle_id = $request->circle;
        $society->societytype_id = $request->societytype;
        $society->society_name = $request->society;
        $society->registration_no = $request->regno;
        $society->staff_name = $request->staff_name;
        $society->designation = $request->designation;
        $society->mobile_no = $request->mobile_no;
        $society->address = $request->address;
        $society->pincode = $request->pincode;
        $society->email = $request->email;
        $society->update();
        return redirect('/superadmin/societymaster')->with('success', 'Society Updated Successfully...');
    }

    // Society Type
    function societytype(Request $request) {
        $societytypes = DB::table('mtr_societytype')
            ->leftJoin('mtr_role','mtr_role.id','mtr_societytype.role_id')
            ->select('mtr_societytype.*','mtr_role.role_name')
            ->get();
        $title = "List of Society Types";
        return view("superadmin.master",compact("societytypes","title"));
    }
    function societytypeAdd(Request $request) {
        $roles = DB::table('mtr_role')->get();
        $title = "Add Society Type";
        return view("superadmin.edit.societytype",compact("roles","title"));
    }
    function societytypeStore(Request $request) {
        $societytype = new Mtr_societytype;
        $societytype->societytype = $request->societytype;
        $societytype->role_id = $request->role;
        $societytype->societycode = $request->code;
        $societytype->save();

        return redirect('/superadmin/societytypemaster')->with('success', 'Society Type Added Successfully...');
    }
    function societytypeEdit(Request $request, $id) {
        $societytype = DB::table('mtr_societytype')
            ->leftJoin('mtr_role','mtr_role.id','mtr_societytype.role_id')
            ->select('mtr_societytype.*','mtr_role.role_name')
            ->where('mtr_societytype.id', $id)
            ->first();
        // return $societytype;
        $roles = DB::table('mtr_role')->get();
        if(empty($societytype)) {
            return redirect('/superadmin/societytypemaster')->with('warning', 'Society Type does not exist!');
        }
        $title = "Edit Society Types";
        return view("superadmin.edit.societytype",compact("societytype","roles","title"));

    }
    function societytypeUpdate(Request $request, $id) {
        $societytype = Mtr_societytype::find($id);
        if(empty($societytype)) {
            return redirect('/superadmin/societytypemaster')->with('warning', 'Society Type does not exist!');
        }
        $societytype->societytype = $request->societytype;
        $societytype->role_id = $request->role;
        $societytype->societycode = $request->code;
        $societytype->update();

        return redirect('/superadmin/societytypemaster')->with('success', 'Society Type Updated Successfully...');
    }

    // District
    function district(Request $request) {
        $districts = DB::table('mtr_districts')->get();
        $title = "List of Districts";
        return view("superadmin.master",compact("districts","title"));
    }
    function districtAdd(Request $request) {
        $title = "Add District";
        return view("superadmin.edit.district")->with("title",$title);
    }
    function districtStore(Request $request) {
        $district = new Mtr_districts;
        $district->districtName = $request->districtName;
        $district->save();

        return redirect('/superadmin/districtmaster')->with('success', 'District Added Successfully...');
    }
    function districtEdit(Request $request, $id) {
        $district = Mtr_districts::find($id);
        if(empty($district)) {
            return redirect('/superadmin/districtmaster')->with('warning', 'District does not exist!');
        }
        $title = "Edit Districts";
        return view("superadmin.edit.district",compact("district","title"));

    }
    function districtUpdate(Request $request, $id) {
        $district = Mtr_districts::find($id);
        if(empty($district)) {
            return redirect('/superadmin/districtmaster')->with('warning', 'District does not exist!');
        }
        $district->districtName = $request->districtName;
        $district->update();

        return redirect('/superadmin/districtmaster')->with('success', 'District Updated Successfully...');
    }

    // Block
    function block(Request $request) {
        $blocks = DB::table('mtr_blockpanchayat')
            ->leftJoin('mtr_districts','mtr_districts.districtID','mtr_blockpanchayat.districtID')
            ->select('mtr_blockpanchayat.*','mtr_districts.districtName')
            ->get();
        $title = "List of Block Panchayat";
        return view("superadmin.master",compact("blocks","title"));
    }
    function blockAdd(Request $request) {
        $districts = DB::table('mtr_districts')->get();
        $title = "Add block";
        return view("superadmin.edit.block",compact("districts","title"));
    }
    function blockStore(Request $request) {
        $block = new Mtr_blockpanchayat;
        $block->blockPanchayatName = $request->block;
        $block->districtID = $request->district;
        $block->save();

        return redirect('/superadmin/blockmaster')->with('success', 'Block Panchayat Added Successfully...');
    }
    function blockEdit(Request $request, $id) {
        $block = DB::table('mtr_blockpanchayat')
            ->leftJoin('mtr_districts','mtr_districts.districtID','mtr_blockpanchayat.districtID')
            ->select('mtr_blockpanchayat.*','mtr_districts.districtName')
            ->where('mtr_blockpanchayat.blockPanchayatID', $id)
            ->first();// return $blocks;
        if(empty($block)) {
            return redirect('/superadmin/blockmaster')->with('warning', 'Block Panchayat does not exist!');
        }
        $districts = DB::table('mtr_districts')->get();
        $title = "Edit Block Panchayat";
        return view("superadmin.edit.block",compact("block","districts","title"));
    }
    function blockUpdate(Request $request, $id) {
        $block = Mtr_blockpanchayat::find($id);
        if(empty($block)) {
            return redirect('/superadmin/blockmaster')->with('warning', 'Block Panchayat does not exist!');
        }
        $block->blockPanchayatName = $request->block;
        $block->districtID = $request->district;
        $block->update();

        return redirect('/superadmin/blockmaster')->with('success', 'Block Panchayat Updated Successfully...');
    }

    // Village
    function village(Request $request) {
        $villages = DB::table('mtr_villagepanchayat')
            ->leftJoin('mtr_blockpanchayat','mtr_blockpanchayat.blockPanchayatID','mtr_villagepanchayat.blockPanchayatID')
            ->leftJoin('mtr_districts','mtr_districts.districtID','mtr_villagepanchayat.districtID')
            ->select('mtr_villagepanchayat.*','mtr_blockpanchayat.blockPanchayatName','mtr_districts.districtName')
            ->get();
        $title = "List of Village Panchayat";
        return view("superadmin.master",compact("villages","title"));
    }
    function villageAdd(Request $request) {
        $districts = DB::table('mtr_districts')->get();
        $blocks = DB::table('mtr_blockpanchayat')->get();
        $title = "Add village";
        return view("superadmin.edit.village",compact("districts","blocks","title"));
    }
    function villageStore(Request $request) {
        $village = new Mtr_villagepanchayat;
        $village->districtID = $request->district;
        $village->blockPanchayatID = $request->block;
        $village->villagePanchayatName = $request->village;
        $village->save();

        return redirect('/superadmin/villagemaster')->with('success', 'Village Panchayat Added Successfully...');
    }
    function villageEdit(Request $request, $id) {
        $village = DB::table('mtr_villagepanchayat')
            ->leftJoin('mtr_districts','mtr_districts.districtID','mtr_villagepanchayat.districtID')
            ->leftJoin('mtr_blockpanchayat','mtr_blockpanchayat.blockPanchayatID','mtr_villagepanchayat.blockPanchayatID')
            ->select('mtr_villagepanchayat.*','mtr_districts.districtName','mtr_blockpanchayat.blockPanchayatName')
            ->where('mtr_villagepanchayat.villagePanchayatID', $id)
            ->first();// return $village;
        if(empty($village)) {
            return redirect('/superadmin/villagemaster')->with('warning', 'Village Panchayat does not exist!');
        }
        $districts = DB::table('mtr_districts')->get();
        $blocks = DB::table('mtr_blockpanchayat')->get();
        $title = "Edit village Panchayat";
        return view("superadmin.edit.village",compact("village","districts","blocks","title"));
    }
    function villageUpdate(Request $request, $id) {
        $village = Mtr_villagepanchayat::find($id);
        if(empty($village)) {
            return redirect('/superadmin/villagemaster')->with('warning', 'Village Panchayat does not exist!');
        }
        $village->districtID = $request->district;
        $village->blockPanchayatID = $request->block;
        $village->villagePanchayatName = $request->village;
        $village->update();

        return redirect('/superadmin/villagemaster')->with('success', 'Village Panchayat Updated Successfully...');
    }

    // Crop
    function crop(Request $request) {
        $crops = DB::table('mtr_crop')->get();
        $title = "List of Crops";
        return view("superadmin.master",compact("crops","title"));
    }
    function cropAdd(Request $request) {
        $title = "Add crop";
        return view("superadmin.edit.crop")->with("title",$title);
    }
    function cropStore(Request $request) {
        $crop = new Mtr_crop;
        $crop->crop_name = $request->crop;
        $crop->save();

        return redirect('/superadmin/cropmaster')->with('success', 'Crop Added Successfully...');
    }
    function cropEdit(Request $request, $id) {
        $crop = Mtr_crop::find($id);
        if(empty($crop)) {
            return redirect('/superadmin/cropmaster')->with('warning', 'Crop does not exist!');
        }
        $title = "Edit crops";
        return view("superadmin.edit.crop",compact("crop","title"));

    }
    function cropUpdate(Request $request, $id) {
        $crop = Mtr_crop::find($id);
        if(empty($crop)) {
            return redirect('/superadmin/cropmaster')->with('warning', 'Crop does not exist!');
        }
        $crop->crop_name = $request->crop;
        $crop->update();

        return redirect('/superadmin/cropmaster')->with('success', 'Crop Updated Successfully...');
    }

    // Deposits
    function deposit(Request $request) {
        $deposits = DB::table('mtr_deposits')->get();
        $title = "List of Deposits";
        return view("superadmin.master",compact("deposits","title"));
    }
    function depositAdd(Request $request) {
        $title = "Add Deposit";
        return view("superadmin.edit.deposit")->with("title",$title);
    }
    function depositStore(Request $request) {
        $deposit = new Mtr_deposits;
        $deposit->deposit_name = $request->deposit;
        $deposit->save();
        return redirect('/superadmin/depositmaster')->with('success', 'Deposit Added Successfully...');
    }
    function depositEdit(Request $request, $id) {
        $deposit = Mtr_deposits::find($id);
        if(empty($deposit)) {
            return redirect('/superadmin/depositmaster')->with('warning', 'Deposit does not exist!');
        }
        $title = "Edit Deposit";
        return view("superadmin.edit.deposit",compact("deposit","title"));

    }
    function depositUpdate(Request $request, $id) {
        $deposit = Mtr_deposits::find($id);
        if(empty($deposit)) {
            return redirect('/superadmin/depositmaster')->with('warning', 'Deposit does not exist!');
        }
        $deposit->deposit_name = $request->deposit;
        $deposit->update();

        return redirect('/superadmin/depositmaster')->with('success', 'Deposit Updated Successfully...');
    }

    // Loan
    function loan(Request $request) {
        $loan = DB::table('mtr_loan')->get();
        $title = "List of Loans";
        return view("superadmin.master",compact("loan","title"));
    }
    function loanAdd(Request $request) {
        $title = "Add loan";
        return view("superadmin.edit.loan")->with("title",$title);
    }
    function loanStore(Request $request) {
        $loan = new Mtr_loan;
        $loan->loantype = $request->loan;
        $loan->save();

        return redirect('/superadmin/loanmaster')->with('success', 'Loan Added Successfully...');
    }
    function loanEdit(Request $request, $id) {
        $loan = Mtr_loan::find($id);
        if(empty($loan)) {
            return redirect('/superadmin/loanmaster')->with('warning', 'Loan does not exist!');
        }
        $title = "Edit loans";
        return view("superadmin.edit.loan",compact("loan","title"));

    }
    function loanUpdate(Request $request, $id) {
        $loan = Mtr_loan::find($id);
        if(empty($loan)) {
            return redirect('/superadmin/loanmaster')->with('warning', 'Loan does not exist!');
        }
        $loan->loantype = $request->loan;
        $loan->update();

        return redirect('/superadmin/loanmaster')->with('success', 'Loan Updated Successfully...');
    }

    // Purchase
    function purchase(Request $request) {
        $purchase = DB::table('mtr_purchase')->get();
        $title = "List of Purchases";
        return view("superadmin.master",compact("purchase","title"));
    }
    function purchaseAdd(Request $request) {
        $title = "Add Purchase";
        return view("superadmin.edit.purchase")->with("title",$title);
    }
    function purchaseStore(Request $request) {
        $purchase = new Mtr_purchase;
        $purchase->purchase_name = $request->purchase;
        $purchase->save();

        return redirect('/superadmin/purchasemaster')->with('success', 'Purchase Added Successfully...');
    }
    function purchaseEdit(Request $request, $id) {
        $purchase = Mtr_purchase::find($id);
        if(empty($purchase)) {
            return redirect('/superadmin/purchasemaster')->with('warning', 'Purchase does not exist!');
        }
        $title = "Edit Purchases";
        return view("superadmin.edit.purchase",compact("purchase","title"));

    }
    function purchaseUpdate(Request $request, $id) {
        $purchase = Mtr_purchase::find($id);
        if(empty($purchase)) {
            return redirect('/superadmin/purchasemaster')->with('warning', 'Purchase does not exist!');
        }
        $purchase->purchase_name = $request->purchase;
        $purchase->update();

        return redirect('/superadmin/purchasemaster')->with('success', 'Purchase Updated Successfully...');
    }

    // Sale
    function sale(Request $request) {
        $sale = DB::table('mtr_sale')->get();
        $title = "List of Sales";
        return view("superadmin.master",compact("sale","title"));
    }
    function saleAdd(Request $request) {
        $title = "Add Sale";
        return view("superadmin.edit.sale")->with("title",$title);
    }
    function saleStore(Request $request) {
        $sale = new Mtr_Sale;
        $sale->sale_name = $request->sale;
        $sale->save();

        return redirect('/superadmin/salemaster')->with('success', 'Sale Added Successfully...');
    }
    function saleEdit(Request $request, $id) {
        $sale = Mtr_Sale::find($id);
        if(empty($sale)) {
            return redirect('/superadmin/salemaster')->with('warning', 'Sale does not exist!');
        }
        $title = "Edit Sale";
        return view("superadmin.edit.sale",compact("sale","title"));

    }
    function saleUpdate(Request $request, $id) {
        $sale = Mtr_Sale::find($id);
        if(empty($sale)) {
            return redirect('/superadmin/salemaster')->with('warning', 'Sale does not exist!');
        }
        $sale->sale_name = $request->sale;
        $sale->update();

        return redirect('/superadmin/salemaster')->with('success', 'Sale Updated Successfully...');
    }

    // Service
    function service(Request $request) {
        $services = DB::table('mtr_services')->get();
        $title = "List of Services";
        return view("superadmin.master",compact("services","title"));
    }
    function serviceAdd(Request $request) {
        $title = "Add Service";
        return view("superadmin.edit.service")->with("title",$title);
    }
    function serviceStore(Request $request) {
        $service = new Mtr_services;
        $service->services_name = $request->service;
        $service->save();

        return redirect('/superadmin/servicemaster')->with('success', 'Service Added Successfully...');
    }
    function serviceEdit(Request $request, $id) {
        $service = Mtr_services::find($id);
        if(empty($service)) {
            return redirect('/superadmin/servicemaster')->with('warning', 'Service does not exist!');
        }
        $title = "Edit Services";
        return view("superadmin.edit.service",compact("service","title"));

    }
    function serviceUpdate(Request $request, $id) {
        $service = Mtr_services::find($id);
        if(empty($service)) {
            return redirect('/superadmin/servicemaster')->with('warning', 'Service does not exist!');
        }
        $service->services_name = $request->service;
        $service->update();

        return redirect('/superadmin/servicemaster')->with('success', 'Service Updated Successfully...');
    }

    // Mino Millet
    function minomillet(Request $request) {
        $minomillets = DB::table('mtr_minomillet')->get();
        $title = "List of Mino Millet";
        return view("superadmin.master",compact("minomillets","title"));
    }
    function minomilletAdd(Request $request) {
        $title = "Add Minomillet";
        return view("superadmin.minomillet")->with("title",$title);
    }
    function minomilletStore(Request $request) {
        $minomillet = new Mtr_minomillet;
        $minomillet->grain_name = $request->minomillet;
        $minomillet->save();

        return redirect('/superadmin/minomilletmtr')->with('success', 'Minomillet Added Successfully...');
    }
    function minomilletEdit(Request $request, $id) {
        $minomillet = Mtr_minomillet::find($id);
        if(empty($minomillet)) {
            return redirect('/superadmin/minomilletmtr')->with('warning', 'Minomillet does not exist!');
        }
        $title = "Edit Minomillets";
        return view("superadmin.edit.minomillet",compact("minomillet","title"));

    }
    function minomilletUpdate(Request $request, $id) {
        $minomillet = Mtr_minomillet::find($id);
        if(empty($minomillet)) {
            return redirect('/superadmin/minomilletmtr')->with('warning', 'Minomillet does not exist!');
        }
        $minomillet->grain_name = $request->minomillet;
        $minomillet->update();

        return redirect('/superadmin/minomilletmtr')->with('success', 'Minomillet Updated Successfully...');
    }
}
