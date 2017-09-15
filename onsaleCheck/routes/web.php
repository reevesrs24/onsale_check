<?php

use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

	$time = DB::table('onsales')->select('time')
                                ->distinct()
                                ->orderBy('time', 'desc')
                                ->take(5)
                                ->get();

    return view('dashboard', ['times' => $time]);
});

Route::get('/onsale-events/{id}', 'OnsaleController@getOnsaleEventView');

