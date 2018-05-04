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
        return view('pages.config');
    }
    
    public function configSafe(Request $request)
    {   
       $company = new Company;
       $company->fill($request->all());
       $company->save();
       
        return view('dekra');
    }
}
