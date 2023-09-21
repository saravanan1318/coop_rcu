<?php

namespace App\Http\Controllers;

use App\Models\Mtr_circle;
use App\Models\Mtr_society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GeneralController extends Controller
{
    //
    public function fetchCircles($regionId)
    {
        // Fetch circle options based on the $regionId

        $circles = Mtr_circle::where('region_id', $regionId)->get();

        // Generate and return HTML options
        $options = '<option value="">All</option>';
        foreach ($circles as $circle) {
            $options .= "<option value='$circle->id'>$circle->circle_name</option>";
        }

        return $options;
    }

    public function fetchSocieties($circleId)
    {
        // Fetch society options based on the $circleId
        $societies = Mtr_society::where('circle_id', $circleId)->get();

        // Generate and return HTML options
        $options = '<option value="">All</option>';
        foreach ($societies as $society) {
            $options .= "<option value='$society->id'>$society->society_name</option>";
        }

        return $options;
    }


    public function fetchSocietiesfromtype(Request $request)
    {
        $socitytype = $request->input('socitytype');
        $circleID = $request->input('circleID');
        $region = $request->input('region');

        $societies = Mtr_society::where('societytype_id', $socitytype)
            ->where('circle_id', $circleID)
            ->where('region_id', $region)
            ->get();
        $options = '<option value="">All</option>';
        foreach ($societies as $society) {
            $options .= "<option value='$society->id'>$society->society_name</option>";
        }

        return $options;

        // Return the response, such as JSON, HTML options, etc.
    }
    public function fetchSocietiestypefromregions(Request $request)
    {
        Log::info($request);

        $circleID = $request->input('circleID');
        $region = $request->input('region');

        $soctietyvalue = DB::table('mtr_societytype')
            ->whereIn('role_id', function ($query) use ($circleID, $region) {
                $query->select('role')
                    ->from('users');
                if($region) {
                    $query->where('region_id', $region);
                }
                if($circleID) {
                    $query->where('circle_id', $circleID);
                }
            });


        $sqlQuery = $soctietyvalue->toSql();
        Log::info("Generated SQL Query: " . $sqlQuery);

// Execute the query and get the results



        $societies=$soctietyvalue->get();


//        $societies = Mtr_society::where('societytype_id', $socitytype)
//            ->where('circle_id', $circleID)
//            ->where('region_id', $region)
//            ->get();
        $options = '<option value="">All</option>';
        foreach ($societies as $society) {
            $options .= "<option value='$society->id'>$society->societytype</option>";
        }

        return $options;

        // Return the response, such as JSON, HTML options, etc.
    }

}
