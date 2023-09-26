<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drpds_byi;
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
}
