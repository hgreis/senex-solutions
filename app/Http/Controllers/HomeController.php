<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

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
        return view('tutorial');
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
