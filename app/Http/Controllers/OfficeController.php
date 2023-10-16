<?php

namespace App\Http\Controllers;

use App\Models\Mtr_petition_subject;
use App\Models\Mtr_section_name;
use Illuminate\Http\Request;
use App\Models\Office_cm;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role == 21) {
                return $next($request);
            }

            abort(403);
        });
    }
    function dashboard()
    {
        return view("dashboard");
    }

    function cmadd()
    {

        $off = Office_cm::select('*')->paginate(5);
        $peti = Mtr_petition_subject::all();
        $section = Mtr_section_name::all();
        return view("office.add", compact('off', 'peti', 'section'));
    }

    function cmlist()
    {

//        $off = Office_cm::select('*')->join('mtr_petition_subject', 'office_cm.petition_related_to', '=', 'mtr_petition_subject.id')
//            ->join('mtr_section_name', 'office_cm.fwd_to_section_name', '=', 'mtr_section_name.id')
//            ->get();
        $off=$offices = Office_cm::select('office_cm.*', 'mtr_petition_subject.*', 'fwd_section.section_name as fwd_section_name', 'edited_section.section_name as edited_section_name')
            ->join('mtr_petition_subject', 'office_cm.petition_related_to', '=', 'mtr_petition_subject.id')
            ->join('mtr_section_name as fwd_section', 'office_cm.fwd_to_section_name', '=', 'fwd_section.id')
            ->join('mtr_section_name as edited_section', 'office_cm.edited_new_section_name', '=', 'edited_section.id')
            ->get();

        return view("office.list", compact('off'));
    }

    function cmstore(Request $request)
    {
        $request->validate([
            'cm_cell_petition_no' => 'required|string|max:255',
            'petitioner_name' => 'required|string|max:255',
            'petition_related_to' => 'required|string|max:255',
            'received_date' => 'required|date',
            'fwd_to_section_name' => 'required|string|max:255',
            'edited_new_section_name' => 'required|string|max:255',
            'edited_date' => 'required|date',
            'closure' => 'required|string|max:255',
        ]);

        $cmCellPetition = new Office_cm(); // Assuming "CmCellPetition" is your Eloquent model for the "CM CELL Petitions" table

        $cmCellPetition->cm_cell_petition_no = $request->input('cm_cell_petition_no');
        $cmCellPetition->petitioner_name = $request->input('petitioner_name');
        $cmCellPetition->petition_related_to = $request->input('petition_related_to');
        $cmCellPetition->received_date = $request->input('received_date');
        $cmCellPetition->fwd_to_section_name = $request->input('fwd_to_section_name');
        $cmCellPetition->reply_sent_date = $request->input('reply_sent_date');
        $cmCellPetition->edited_new_section_name = $request->input('edited_new_section_name');
        $cmCellPetition->edited_date = $request->input('edited_date');
        $cmCellPetition->closure = $request->input('closure');

        $cmCellPetition->save();

        return redirect('/office/cm/list')->with('status', 'CM CELL Petition added successfully');
    }
}
