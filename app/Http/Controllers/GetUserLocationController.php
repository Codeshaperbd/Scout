<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GetUserLocationController extends Controller
{
    //


    //local city/state
    public function getStateList(Request $request)
    {
        $state = DB::table("states")
                    ->where("country_id",$request->country_id)
                    ->pluck("name","id");
        return response()->json($state);
    }
    //local c
    public function getCityList(Request $request)
    {
        $city = DB::table("cities")
                    ->where("state_id",$request->state_id)
                    ->pluck("name","id");
        return response()->json($city);
    }
}
