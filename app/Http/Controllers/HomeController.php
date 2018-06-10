<?php

namespace App\Http\Controllers;

// use Request;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Company;
use App\Mission;

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

    public function dekra() {
        return view('dekra');
    }
    
    public function tutorial() {
        $input = new Mission;
        $choice = 'Touren-Start';
        return view('pages.mission', compact('input', 'choice'));
    }

    public function tutorial_save(Request $request) {
        if (isset($request->id)) {
            $input = Mission::find($request->id);
        } else {
            $input = new Mission;
        }
        $input->fill($request->all());
        $input->save();
        $choice = $request->submit;
        return view('pages.mission', compact('input', 'choice'));
    }
    
    public function config() {
        $companies = Company::all();
        return view('pages.config', compact('companies'));
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
}
