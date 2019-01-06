<?php

namespace App\Http\Controllers;

// use Request;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Company;
use App\Mission;
use App\Customer;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

        
    public function menu() {
        return view('pages.menu');
    }
    
    public function menu_invoice() {
        return view('pages.menu_invoice');
    }

    public function menu_config() {
        return view('pages.menu_config');
    }

    public function configSafe(Request $request)
    {   
        if (isset($request->saved))
        {
            $company = Company::find($request->saved);
            $company->fill($request->all());
            $company->save();
            return view('dekra');
        }
        $savedCompanies = Company::all();
        foreach ($savedCompanies as $savedCompany) {
           if ($savedCompany->nameCompany == $request->nameCompany)
           {
                $company = $savedCompany;
                return view('pages.config', compact('company'));
           }
        }
            $company = new Company;
            $company->fill($request->all());
            $company->save();
       
        return view('dekra');
    }

    public function customerDelete($id) {
        Customer::find($id)->delete();
        return redirect('/customer');
    }

    public function chartMission($start, $end) {
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

        return view('pages.chart', compact('companies'));
    }
}
