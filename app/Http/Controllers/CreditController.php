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
        $driver->company = Company::find($request->company);
    	$driver->missions = Mission::where('fahrer', $driver->name)
    				->where('company', $request->company)
    				->where('credit', null)
    				->get();
    	
    	$credit = new Credit;
    	$credit->date = now();
        $credit->driver = $driver->id;
    	$credit->company = $request->company;
    	$credit->number = $credit->getNumber();
    	$credit->save();
    	foreach ($driver->missions as $mission) {
    		if(isset($request[$mission->id])) {
    			Mission::find($mission->id)->update(['credit' => $credit->number]);
    			$summe = $summe + $mission->preisFahrer;
    		}
    	}
    	$credit->priceNet = $summe;
    	$credit->priceGross = $summe * 1.19;
    	$credit->save();
        $credit->savePDF();

        return redirect('/credits/'.$request->company);
    }

    public function listForCredits($company) {
        if($company == 1) {
            $drivers = Driver::whereHas('missions', function($query) {
                    $query->whereNull('credit')
                        ->where('company', 1);
                })->with(['missions' => function($query) {
                    $query->whereNull('credit')
                        ->where('company', 1);
                }])->orderBy('name')->get();
        }
        if($company == 2) {
            $drivers = Driver::whereHas('missions', function($query) {
                    $query->whereNull('credit')
                        ->where('company', 2);
                })->with(['missions' => function($query) {
                    $query->whereNull('credit')
                        ->where('company', 2);
                }])->orderBy('name')->get();
        }
        return view('pages.creditsGenerate', compact('company', 'drivers'));
    }

    public function listCredits($company)   {
        $credits = Credit::where('company', $company)->get()->sortByDesc('number');
        $credits->company = $company;
        foreach ($credits as $credit) {
            $credit->driver = Driver::find($credit->driver);
        }
        return view('pages.listCredits', compact('credits'));
    }

    public function payCredits($company) {
        $credits = Credit::where('company', $company)
            ->where('credit_paid', null)
            ->get();
        $credits->company = $company;
        foreach ($credits as $credit) {
            $credit->driver = Driver::find($credit->driver);
        }
        return view('pages.payCredits', compact('credits'));
    }

    public function payCredit($id)  {
        $credit = Credit::find($id);
        $credit->credit_paid = now();
        $credit->save();
        return redirect('/payCredits/'.$credit->company);
    }
}
