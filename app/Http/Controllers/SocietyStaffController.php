<?php

namespace App\Http\Controllers;

use App\Models\Mtr_circle;
use App\Models\Mtr_region;
use App\Models\Mtr_society;
use App\Models\Society_Staff;
use App\Models\YESORNO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocietyStaffController extends Controller
{
    //
    function add(){
        $region=Mtr_region::all();
        $circle=Mtr_circle::all();
        $society=Mtr_society::all();
        $yesorno=YESORNO::all();
        $qualification=["10th","12th","Degree"];
        $AppointmentType=["Regular","Irregular"];
        $RegularAppointmentType=["DRB","SRB","Through Board","Compassionate Ground"];
        $cadre=["Assistant","Junior Assistant","Office Assistant","Driver","Packer","Salesman","Watchman","Others"];
        $presentworkingcadre=["General Manager","Asst General Manager","Deputy General Manager","Manager","Asst Manager","Secretary","Asst Secretary","Accountant","Assistant","Junior Assistant","Office Assistant","Driver","Packer","Salesman","Watchman","Others"];

        return view('society.staff.add',compact('region','circle','society','yesorno','qualification','AppointmentType','RegularAppointmentType','cadre','presentworkingcadre'));

    }
    function list(){
        $rti=$result = DB::table('societystaff')
            ->select('societystaff.*', 'mtregion.region_name', 'mtcircle.circle_name', 'mtsociety.society_name', 'mtdeptsociety.society_name as deput_society')
            ->leftJoin('mtr_region as mtregion', 'mtregion.id', '=', 'societystaff.region')
            ->leftJoin('mtr_circle as mtcircle', 'mtcircle.id', '=', 'societystaff.circle')
            ->leftJoin('mtr_society as mtsociety', 'mtsociety.id', '=', 'societystaff.society')
            ->leftJoin('mtr_society as mtdeptsociety', 'mtdeptsociety.id', '=', 'societystaff.deputatedSociety')
            ->get();

        return view('society.staff.list',compact('rti'));

    }
    function store(Request $request){
        $records=new Society_Staff();
        $records->fill($request->all());

        // Save the model to the database
        $records->save();
        return redirect('/society/staff/list')->with('status', 'Staff added successfully');
    }
    function edit(Request $request,$id){

        $records=Society_Staff::where('id',$id)->first();
        $region=Mtr_region::all();
        $circle=Mtr_circle::all();
        $society=Mtr_society::all();
        $yesorno=YESORNO::all();
        $qualification=["10th","12th","Degree"];
        $AppointmentType=["Regular","Irregular"];
        $RegularAppointmentType=["DRB","SRB","Through Board","Compassionate Ground"];
        $cadre=["Assistant","Junior Assistant","Office Assistant","Driver","Packer","Salesman","Watchman","Others"];
        $presentworkingcadre=["General Manager","Asst General Manager","Deputy General Manager","Manager","Asst Manager","Secretary","Asst Secretary","Accountant","Assistant","Junior Assistant","Office Assistant","Driver","Packer","Salesman","Watchman","Others"];

        return view('society.staff.edit',compact('records','region','circle','society','yesorno','qualification','AppointmentType','RegularAppointmentType','cadre','presentworkingcadre'));
    }
    function updateData(Request $request)
    {
        $id=$request->input("id");
        $record = Society_Staff::find($id); // Replace $id with the ID of the record you want to update

        if ($record) {
            $record->fill($request->all());
            $record->save();

            return redirect('/society/staff/list')->with('status', 'Staff Updated successfully');

        }
    }
}
