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

class ListingController extends Controller
{
    public function listForListings()   {
        $customers = Customer::whereHas('missions', function($query) {
                    $query->whereNull('bill_id')
                        ->where('company', 1);
                })->with(['missions' => function($query) {
                    $query->whereNull('bill_id')
                        ->where('company', 1);
                }])->orderBy('name')->get();
        return $customers;
    }
}
