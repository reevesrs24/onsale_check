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

    public function getOnsaleCheckTimes(Request $request) {
        
        $times = DB::table('onsales')->select('time')
                                     ->distinct()
                                     ->orderBy('time', 'desc')
                                     ->get();

        return response()->json($times);
    }

    public function getOnsaleCheckData(Request $request) {

        $data = DB::table('onsales')->select('*')
                                    ->where('time', $request->time)
                                    ->take(20)
                                    ->get();

        return response()->json($data);
    }

    public function getOnsaleEventView($id) {

        $time = DB::table('onsales')->select('*')
                                    ->where('time', $id)
                                    ->simplePaginate(10);


        return view('onsale-events', compact('time'));
    }

    public function updateOnsaleData(Request $request) {
        
        $result = array(); 
        //return $request->input('event_pass');
        DB::table('onsales')->where('event_id', $request->input('event_id'))
                            ->update(['event_pass' => $request->input('event_pass')]);


        $result["sucess"] = true;
        return response()->json($result);
    }



}
    