<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drpds_byi;
use App\Models\Drpds_bys;
use App\Models\Drpds_duesalt;
use App\Models\Drpds_facelifting;
use App\Models\Drpds_indcoserve;
use App\Models\Drpds_iso;
use App\Models\Drpds_salt;
use App\Models\Drpds_special;
use App\Models\Drpds_tea;
use Illuminate\Support\Facades\Auth;

class DRPDSController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role == 14) {
                return $next($request);
            }
            abort(403);
        });
    }

    function dashboard()
    {
        return view("dashboard");
    }

    function identifiedadd()
    {

        $drpds = Drpds_byi::select('*')->paginate(5);
        return view("drpds.build_yet_identified.add", compact('drpds'));
    }

    function identifiedlist()
    {

        $drpds = Drpds_byi::select('*')->paginate(5);
        return view("drpds.build_yet_identified.list", compact('drpds'));
    }


    function identifiedstore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'identifieddate' => 'required',
            'prb' => 'required|',
            'fps' => 'required|',
            'fpsc' => 'required|',
        ]);

        // Create a new instance of the model and populate it with the form data
        $byi = new Drpds_byi();
        $byi->region_id = Auth::user()->region_id;
        $byi->user_id = Auth::user()->id;
        $byi->identifieddate = $request->input('identifieddate');
        $byi->prb = $request->input('prb');
        $byi->fps = $request->input('fps');
        $byi->fpsc = $request->input('fpsc');
        $byi->save();

        return redirect('/drpds/build_yet_identified/list')->with('status', 'BYI added successfully');
    }


    function startedadd()
    {

        $drpds = Drpds_bys::select('*')->paginate(5);
        return view("drpds.build_yet_started.add", compact('drpds'));
    }

    function startedlist()
    {

        $drpds = Drpds_bys::select('*')->paginate(5);
        return view("drpds.build_yet_started.list", compact('drpds'));
    }


    function startedstore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'starteddate' => 'required',
            'prb' => 'required|',
            'fps' => 'required|',
            'fpsc' => 'required|',
            'cas' => 'required|',
            'cc' => 'required',
            'cfc' => 'required',
            'cnc' => 'required',
        ]);


        $byi = new Drpds_bys();
        $byi->region_id = Auth::user()->region_id;
        $byi->user_id = Auth::user()->id;
        $byi->starteddate = $request->input('starteddate');
        $byi->prb = $request->input('prb');
        $byi->fps = $request->input('fps');
        $byi->fpsc = $request->input('fpsc');
        $byi->cas = $request->input('cas');
        $byi->cc = $request->input('cc');
        $byi->cfc = $request->input('cfc');
        $byi->cnc = $request->input('cnc');
        $byi->save();

        return redirect('/drpds/build_yet_started/list')->with('status', 'BYS added successfully');
    }

    function faceliftingadd()
    {

        $drpds = Drpds_facelifting::select('*')->paginate(5);
        return view("drpds.facelifting.add", compact('drpds'));
    }

    function faceliftinglist()
    {

        $drpds = Drpds_facelifting::select('*')->paginate(5);
        return view("drpds.facelifting.list", compact('drpds'));
    }


    function faceliftingstore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'faceliftingdate' => 'required',
            'fpsb' => 'required|',
            'fpsp' => 'required|',
            'due' => 'required|',
        ]);

        // Create a new instance of the model and populate it with the form data
        $byi = new Drpds_facelifting();
        $byi->region_id = Auth::user()->region_id;
        $byi->user_id = Auth::user()->id;
        $byi->faceliftingdate = $request->input('faceliftingdate');
        $byi->fpsb = $request->input('fpsb');
        $byi->fpsp = $request->input('fpsp');
        $byi->due = $request->input('due');
        $byi->save();

        return redirect('/drpds/facelifting/list')->with('status', 'Facelifting added successfully');
    }

    function isoadd()
    {

        $drpds = Drpds_iso::select('*')->paginate(5);
        return view("drpds.iso.add", compact('drpds'));
    }

    function isolist()
    {

        $drpds = Drpds_iso::select('*')->paginate(5);
        return view("drpds.iso.list", compact('drpds'));
    }


    function isostore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'isodate' => 'required',
            'ftfps' => 'required|',
            'ftfpsc' => 'required|',
            'wc' => 'required|',
            'twc' => 'required|',
            'percentage' => 'required|',
        ]);

        // Create a new instance of the model and populate it with the form data
        $byi = new Drpds_iso();
        $byi->region_id = Auth::user()->region_id;
        $byi->user_id = Auth::user()->id;
        $byi->isodate = $request->input('isodate');
        $byi->ftfps = $request->input('ftfps');
        $byi->ftfpsc = $request->input('ftfpsc');
        $byi->wc = $request->input('wc');
        $byi->twc = $request->input('twc');
        $byi->percentage = $request->input('percentage');
        $byi->save();

        return redirect('/drpds/iso/list')->with('status', 'ISO added successfully');
    }
    function teaadd()
    {

        $drpds = Drpds_tea::select('*')->paginate(5);
        return view("drpds.tea.add", compact('drpds'));
    }

    function tealist()
    {

        $drpds = Drpds_tea::select('*')->paginate(5);
        return view("drpds.tea.list", compact('drpds'));
    }


    function teastore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'teadate' => 'required',
            'fmc' => 'required|',
            'nl' => 'required|',
            'purchase' => 'required|',
            'sale' => 'required|',
            'percentage' => 'required|',
        ]);

        // Create a new instance of the model and populate it with the form data
        $byi = new Drpds_tea();
        $byi->region_id = Auth::user()->region_id;
        $byi->user_id = Auth::user()->id;
        $byi->teadate = $request->input('teadate');
        $byi->fmc = $request->input('fmc');
        $byi->nl = $request->input('nl');
        $byi->purchase = $request->input('purchase');
        $byi->sale = $request->input('sale');
        $byi->percentage = $request->input('percentage');
        $byi->save();

        return redirect('/drpds/tea/list')->with('status', 'Ooty Tea Sale added successfully');
    }

    function indcoserveadd()
    {

        $drpds = Drpds_indcoserve::select('*')->paginate(5);
        return view("drpds.indcoserve.add", compact('drpds'));
    }

    function indcoservelist()
    {

        $drpds = Drpds_indcoserve::select('*')->paginate(5);
        return view("drpds.indcoserve.list", compact('drpds'));
    }


    function indcoservestore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'indcoservedate' => 'required',
            'three' => 'required|',
            'six' => 'required|',
            'abovesix' => 'required|',
        ]);

        // Create a new instance of the model and populate it with the form data
        $byi = new Drpds_indcoserve();
        $byi->region_id = Auth::user()->region_id;
        $byi->user_id = Auth::user()->id;
        $byi->indcoservedate = $request->input('indcoservedate');
        $byi->three = $request->input('three');
        $byi->six = $request->input('six');
        $byi->abovesix = $request->input('abovesix');
        $byi->save();

        return redirect('/drpds/indcoserve/list')->with('status', 'Indcoserve added successfully');
    }


    function saltadd()
    {

        $drpds = Drpds_salt::select('*')->paginate(5);
        return view("drpds.salt.add", compact('drpds'));
    }

    function saltlist()
    {

        $drpds = Drpds_salt::select('*')->paginate(5);
        return view("drpds.salt.list", compact('drpds'));
    }


    function saltstore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'saltdate' => 'required',
            'dl' => 'required|',
            'purchase' => 'required|',
            'sale' => 'required|',
        ]);

        // Create a new instance of the model and populate it with the form data
        $byi = new Drpds_salt();
        $byi->region_id = Auth::user()->region_id;
        $byi->user_id = Auth::user()->id;
        $byi->saltdate = $request->input('saltdate');
        $byi->dl = $request->input('dl');
        $byi->purchase = $request->input('purchase');
        $byi->sale = $request->input('sale');
        $byi->save();

        return redirect('/drpds/salt/list')->with('status', 'Salt Sales added successfully');
    }


    function duesaltadd()
    {

        $drpds = Drpds_duesalt::select('*')->paginate(5);
        return view("drpds.duesalt.add", compact('drpds'));
    }

    function duesaltlist()
    {

        $drpds = Drpds_duesalt::select('*')->paginate(5);
        return view("drpds.duesalt.list", compact('drpds'));
    }


    function duesaltstore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'duesaltdate' => 'required',
            'three' => 'required|',
            'six' => 'required|',
            'abovesix' => 'required|',
        ]);

        // Create a new instance of the model and populate it with the form data
        $byi = new Drpds_duesalt();
        $byi->region_id = Auth::user()->region_id;
        $byi->user_id = Auth::user()->id;
        $byi->duesaltdate = $request->input('duesaltdate');
        $byi->three = $request->input('three');
        $byi->six = $request->input('six');
        $byi->abovesix = $request->input('abovesix');
        $byi->save();

        return redirect('/drpds/duesalt/list')->with('status', 'Due to TN Salt  added successfully');
    }

    function specialadd()
    {

        $drpds = Drpds_special::select('*')->paginate(5);
        return view("drpds.special.add", compact('drpds'));
    }

    function speciallist()
    {

        $drpds = Drpds_special::select('*')->paginate(5);
        return view("drpds.special.list", compact('drpds'));
    }


    function specialstore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'specialdate' => 'required',
            'principal' => 'required|',
            'intrest' => 'required|',
            'total' => 'required|',
            'sync' => 'required|',
        ]);

        // Create a new instance of the model and populate it with the form data
        $byi = new Drpds_special();
        $byi->region_id = Auth::user()->region_id;
        $byi->user_id = Auth::user()->id;
        $byi->specialdate = $request->input('specialdate');
        $byi->principal = $request->input('principal');
        $byi->intrest = $request->input('intrest');
        $byi->total = $request->input('total');
        $byi->sync = $request->input('sync');
        $byi->save();

        return redirect('/drpds/special/list')->with('status', ' Special Dues  added successfully');
    }
}
