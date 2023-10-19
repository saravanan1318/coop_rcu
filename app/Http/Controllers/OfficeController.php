<?php

namespace App\Http\Controllers;

use App\Models\Mtr_petition_subject;
use App\Models\Mtr_region;
use App\Models\Mtr_section_name;
use App\Models\Office_case;
use App\Models\Office_cm;
use App\Models\Respondents;
use App\Models\SubjectCase;
use App\Models\TypeofCase;
use App\Models\YESORNO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    function cmeditlist(Request $request,$id)
    {

        $off = Office_cm::select('*')->where("id",$id)->first();
        $peti = Mtr_petition_subject::all();
        $section = Mtr_section_name::all();
        return view("office.edit", compact('off', 'peti', 'section'));
    }
    function cmedit(Request $request)
    {
//        return $request;
        $id=$request->input("id");
        $record = Office_cm::find($id);
        $record->edited_new_section_name=implode(",",$request->input("edited_new_section_name"));
        $record->edited_date=$request->input("edited_date");
        $record->reply_sent_date=$request->input("reply_sent_date");
        $record->closure=$request->input("closure");
        $record->isfwdnewsection=$request->input("FWDSelection");
        $record->update();

        $off = Office_cm::select('*')->where("id",$id)->first();
        $peti = Mtr_petition_subject::all();
        $section = Mtr_section_name::all();
        return redirect('/office/cm/list')->with('status', 'CM CELL Petition Updated successfully');
    }

    function cmlist()
    {

//        $off=$offices = Office_cm::select('office_cm.*', 'mtr_petition_subject.subject', 'fwd_section.section_name as fwd_section_name', 'edited_section.section_name as edited_section_name')
//            ->leftjoin('mtr_petition_subject', 'office_cm.petition_related_to', '=', 'mtr_petition_subject.id')
//            ->leftjoin('mtr_section_name as fwd_section', 'office_cm.fwd_to_section_name', '=', 'fwd_section.id')
//            ->leftjoin('mtr_section_name as edited_section1', 'office_cm.edited_new_section_name', '=', 'edited_section.id')
//            ->get();

        $off = DB::table('office_cm')
            ->select(
                'office_cm.*',
                'mtr_petition_subject.subject',
                DB::raw('(
            SELECT GROUP_CONCAT(section_name ORDER BY section_name SEPARATOR \', \')
            FROM mtr_section_name
            WHERE id IN (SELECT DISTINCT id FROM mtr_section_name WHERE FIND_IN_SET(id, office_cm.fwd_to_section_name))
        ) as fwd_section_name'),
                DB::raw('(
            SELECT GROUP_CONCAT(section_name ORDER BY section_name SEPARATOR \', \')
            FROM mtr_section_name
            WHERE id IN (SELECT DISTINCT id FROM mtr_section_name WHERE FIND_IN_SET(id, office_cm.edited_new_section_name))
        ) as edited_section_name')
            )
            ->leftJoin('mtr_petition_subject', 'office_cm.petition_related_to', '=', 'mtr_petition_subject.id')
            ->get();


        return view("office.list", compact('off'));
    }

    function cmstore(Request $request)
    {
//        $request->validate([
//            'cm_cell_petition_no' => 'required|string|max:255',
//            'petitioner_name' => 'required|string|max:255',
//            'petition_related_to' => 'required|string|max:255',
//            'received_date' => 'required|date',
//            'fwd_to_section_name' => 'required|string|max:255',
//        ]);

//        return $request;
        $cmCellPetition = new Office_cm();  // Assuming "CmCellPetition" is your Eloquent model for the "CM CELL Petitions" table

        $cmCellPetition->cm_cell_petition_no = $request->input('cm_cell_petition_no');
        $cmCellPetition->petitioner_name = $request->input('petitioner_name');
        $cmCellPetition->petition_related_to = implode(",",$request->input('petition_related_to'));
        $cmCellPetition->received_date = $request->input('received_date');
        $cmCellPetition->fwd_to_section_name =implode(",", $request->input('fwd_to_section_name'));
        $cmCellPetition->reply_sent_date = $request->input('reply_sent_date');
//        $cmCellPetition->edited_new_section_name = $request->input('edited_new_section_name');
//        $cmCellPetition->edited_date = $request->input('edited_date');
//        $cmCellPetition->closure = $request->input('closure');

        $cmCellPetition->save();

        return redirect('/office/cm/list')->with('status', 'CM CELL Petition added successfully');
    }

    function caseadd()
    {

        $off = Office_case::select('*')->paginate(5);
        $region=Mtr_region::all();
        $typeofcase=TypeofCase::all();
        $subjectofcase=SubjectCase::all();
        $respondents=Respondents::all();
        $yesorno=YESORNO::all();
        return view("case.add", compact('region',"respondents","subjectofcase","typeofcase","yesorno"));
    }

    function caselist()
    {

        $off = DB::table('office_case')
            ->select('*',
                'mtr.region_name AS Region_Name',
                'mtres.respondentValue AS respondent_Value',
                'mtstype.typename AS typeName',
                'mtsubject.value AS subjectcase'
            )
            ->leftJoin('mtr_region AS mtr', 'office_case.Region', '=', 'mtr.id')
            ->leftJoin('mtr_respondents AS mtres', 'office_case.respondents', '=', 'mtres.id')
            ->leftJoin('mtr_typeofcase AS mtstype', 'office_case.type_of_case', '=', 'mtstype.id')
            ->leftJoin('mtr_subject_of_case AS mtsubject', 'office_case.subject_of_case', '=', 'mtsubject.id')
            ->get();
        ;
        return view("case.list", compact('off'));
    }

    function casestore(Request $request)
    {
//        $request->validate([
//            'type_of_case' => 'required|string|max:255',
//            'case_no' => 'required|string|max:255',
//            'year' => 'required|integer',
//            'petitioner' => 'required|string|max:255',
//            'respondents' => 'required|string|max:255',
//            'subject_of_case' => 'required|string|max:255',
//            'prayer' => 'required|string|max:255',
//            'counter_filed' => 'required|string|max:255',
//            'counter_filed_date' => 'required|date',
//            'no_reason' => 'required|string|max:255',
//            'interim_stay' => 'required|string|max:255',
//            'order_details' => 'required|string|max:255',
//            'final_judgement' => 'required|string|max:255',
//            'direction_to_comply' => 'required|string|max:255',
//            'complied' => 'required|string|max:255',
//            'writ_appeal' => 'required|string|max:255',
//            'writ_appeal_details' => 'required|string|max:255',
//            'writ_appeal_stay' => 'required|string|max:255',
//        ]);

        $case = new Office_case();

        $case->region = $request->input('region');
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
        $case->writ_appeal_stage = $request->input('writ_appeal_stage');

        $case->save();

        return redirect('/office/case/list')->with('status', 'Court Case added successfully');
    }
}
