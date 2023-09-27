<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drpds_byi;
use App\Models\Drpds_bys;
use App\Models\Drpds_facelifting;
use App\Models\Drpds_iso;
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
}
