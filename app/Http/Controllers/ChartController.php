<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mission;
use App\Driver;
use App\Customer;
use App\Bill;
use App\Company;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function missions(Request $request) {
    	$datum = $request->startDatum;
        $arr = explode('.', $datum);
        $start = Carbon::createFromDate($arr[2], $arr[1], $arr[0]);

		$datum = $request->endDatum;
        $arr = explode('.', $datum);
        $end = Carbon::createFromDate($arr[2], $arr[1], $arr[0]);

        $companies = Company::all();
        $companies->start = date_format(date_create($start), 'd.m.Y');
        $companies->end = date_format(date_create($end), 'd.m.Y');
        foreach ($companies as $company) {
            $company->umsatz = Mission::where('company', $company->id)
                            ->where('startDatum', '>=', $start)
                            ->where('startDatum', '<=', $end)
                            ->sum('preisKunde');
            $company->kosten = Mission::where('company', $company->id)
                            ->where('startDatum', '>=', $start)
                            ->where('startDatum', '<=', $end)
                            ->sum('preisFahrer');
            $company->gewinn = $company->umsatz - $company->kosten;
        }
        $companies[2] = new Company;
        $companies[2]->nameCompany = 'beide Firmen zusammen';
        $companies[2]->umsatz = Mission::where('startDatum', '>=', $start)
                            ->where('startDatum', '<=', $end)
                            ->sum('preisKunde');
        $companies[2]->kosten = Mission::where('startDatum', '>=', $start)
                            ->where('startDatum', '<=', $end)
                            ->sum('preisFahrer');
        $companies[2]->gewinn = $companies[2]->umsatz - $companies[2]->kosten;
        $companies[2]->customers = Customer::all();

        return view('pages.chart.missions', compact('companies'));
    }

    public function missionsWithoutDates() {
        $end = Carbon::today();
        $year = $end->year;
        $start = new Carbon('first day of January '.$year);

        $companies = Company::all();
        $companies->start = date_format(date_create($start), 'd.m.Y');
        $companies->end = date_format(date_create($end), 'd.m.Y');
        foreach ($companies as $company) {
            $company->umsatz = Mission::where('company', $company->id)
                            ->where('startDatum', '>=', $start)
                            ->where('startDatum', '<=', $end)
                            ->sum('preisKunde');
            $company->kosten = Mission::where('company', $company->id)
                            ->where('startDatum', '>=', $start)
                            ->where('startDatum', '<=', $end)
                            ->sum('preisFahrer');
            $company->gewinn = $company->umsatz - $company->kosten;
        }
        $companies[2] = new Company;
        $companies[2]->nameCompany = 'beide Firmen zusammen';
        $companies[2]->umsatz = Mission::where('startDatum', '>=', $start)
                            ->where('startDatum', '<=', $end)
                            ->sum('preisKunde');
        $companies[2]->kosten = Mission::where('startDatum', '>=', $start)
                            ->where('startDatum', '<=', $end)
                            ->sum('preisFahrer');
        $companies[2]->gewinn = $companies[2]->umsatz - $companies[2]->kosten;
        $companies[2]->customers = Customer::all();

        return view('pages.chart.missions', compact('companies'));
    }
}
