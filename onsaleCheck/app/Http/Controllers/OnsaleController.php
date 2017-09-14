<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OnsaleController extends Controller
{
    public function addOnsaleCheck(Request $request) {
    	$result = array();

    	DB::table('onsales')->insert(
    					['system' => $request->input('system'),
    					 'event_code' => $request->input('event_code'),
    					 'act_name' => $request->input('act_name'),
    					 'venue_name' => $request->input('venue_name'),
    					 'onsale_type' => $request->input('onsale_type'),
    					 'event_id' => $request->input('event_id'),
    					 'time' => $request->input('time')
    					]
					);
        
        $result["sucess"] = true;
    	return response()->json($result);
    }

    public function getOnsaleCheckData(Request $request) {
        
        $times = DB::table('onsales')->select('time')
                                     ->distinct()
                                     ->orderBy('time', 'desc')
                                     ->get();

        return response()->json($times);
    }
}
    