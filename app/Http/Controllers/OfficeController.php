<?php

namespace App\Http\Controllers;

use App\Models\Mtr_petition_subject;
use App\Models\Mtr_section_name;
use App\Models\Office_case;
use App\Models\Office_cm;
use Illuminate\Http\Request;
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

        $off = Office_cm::select('*')->paginate(5);
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
            'reply_sent_date' => 'required|date',
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

    function caseadd()
    {

        $off = Office_case::select('*')->paginate(5);
        return view("case.add", compact('off'));
    }

    function caselist()
    {

        $off = Office_case::select('*')->paginate(5);
        return view("case.list", compact('off'));
    }

    function casestore(Request $request)
    {
        $request->validate([
            'type_of_case' => 'required|string|max:255',
            'case_no' => 'required|string|max:255',
            'year' => 'required|integer',
            'petitioner' => 'required|string|max:255',
            'respondents' => 'required|string|max:255',
            'subject_of_case' => 'required|string|max:255',
            'prayer' => 'required|string|max:255',
            'counter_filed' => 'required|string|max:255',
            'counter_filed_date' => 'required|date',
            'no_reason' => 'required|string|max:255',
            'interim_stay' => 'required|string|max:255',
            'order_details' => 'required|string|max:255',
            'final_judgement' => 'required|string|max:255',
            'direction_to_comply' => 'required|string|max:255',
            'complied' => 'required|string|max:255',
            'writ_appeal' => 'required|string|max:255',
            'writ_appeal_details' => 'required|string|max:255',
            'writ_appeal_stay' => 'required|string|max:255',
        ]);

        $case = new Office_case();

        $case->type_of_case = $request->input('type_of_case');
        $case->case_no = $request->input('case_no');
        $case->year = $request->input('year');
        $case->petitioner = $request->input('petitioner');
        $case->respondents = $request->input('respondents');
        $case->subject_of_case = $request->input('subject_of_case');
        $case->prayer = $request->input('prayer');
        $case->counter_filed = $request->input('counter_filed');
        $case->counter_filed_date = $request->input('counter_filed_date');
        $case->no_reason = $request->input('no_reason');
        $case->interim_stay = $request->input('interim_stay');
        $case->order_details = $request->input('order_details');
        $case->final_judgement = $request->input('final_judgement');
        $case->direction_to_comply = $request->input('direction_to_comply');
        $case->complied = $request->input('complied');
        $case->writ_appeal = $request->input('writ_appeal');
        $case->writ_appeal_details = $request->input('writ_appeal_details');
        $case->writ_appeal_stay = $request->input('writ_appeal_stay');

        $case->save();

        return redirect('/office/case/list')->with('status', 'Court Case added successfully');
    }
}
