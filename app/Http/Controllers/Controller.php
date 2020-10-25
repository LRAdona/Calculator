<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        return view('welcome');
    }

    public function process(Request $request)
    {
		$result = Array();
		
		DB::table('events')->where('id',1)->update([
			'event'			=>  $request->event,
			'start_date'    =>  $request->startdate,
			'end_date'      =>  $request->enddate,
			'weekdays'      =>  implode($request->weekdays,',')
		]);
        
        return view('welcome')->with('result', $result);
    }
}
