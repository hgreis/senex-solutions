<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mission;
use App\Driver;
use App\Customer;
use App\Bill;
use App\Company;
use App\Credit;
use PDF;

class CreditController extends Controller
{
    public function saveCredit(Request $request)	{
    	$summe = 0;
    	$driver = Driver::where('name', $request->submit)->first();
    	$driver->missions = Mission::where('fahrer', $driver->name)
    				->where('company', $request->company)
    				->where('credit', null)
    				->get();
    	
    	$credit = new Credit;
    	$credit->date = now();
    	$credit->company = $request->company;
    	$credit->number = $credit->getNumber();
    	$credit->save();
    	foreach ($driver->missions as $mission) {
    		if(isset($request[$mission->id])) {
    			Mission::find($mission->id)->update(['credit' => $credit->id]);
    			$summe = $summe + $mission->preisFahrer;
    		}
    	}
    	$credit->priceNet = $summe;
    	$credit->priceGross = $summe * 1.19;
    	$credit->save();

    	return $summe;
    }
}
