<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Mission;
use App\Submission;
use App\Driver;
use App\Customer;
use App\Bill;
use App\Company;
use App\Rechnung;
use PDF;

class RechnungController extends Controller
{
    public function new($company) {
    	$rechnung = new Rechnung;
    	$rechnung->company($company);
    	
    	$drivers = Driver::all();
    	
    	return view('pages.rechnung.new', compact('rechnung', 'drivers', 'missions'));
    }

    public function submit(Request $request) {
    	$rechnung = new Rechnung;
    	$rechnung->company = $request->company;
    	$rechnung->driver_id = Driver::where('name', $request->fahrer)->first()->id;
    	$rechnung->priceNet = 0;
    	$rechnung->priceGross = 0;
    	$rechnung->date = now();
    	$rechnung->save();
    	$rechnung->driver();

    	$drivers = Driver::all();
    	$missions = Mission::where('fahrer', $rechnung->driver->name)->get();
//return $rechnung;    	
    	return view('pages.rechnung.edit', compact('rechnung', 'drivers', 'missions'));
    }
}
