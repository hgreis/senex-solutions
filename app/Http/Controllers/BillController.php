<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bill;
use App\Mission;
use App\Customer;
use App\Driver;
use App\Credit;
    
class BillController extends Controller
{
    public function payBill($id) {
        Bill::find($id)->update(['paid' => now()]);
        Mission::where('bill_id', $id)->update(['bill_paid' => now()]);
        $company = Bill::find($id)->company;
        if ($company == 2)  {
        return redirect('/invoicesPaid/2');
        }
        return redirect('/invoicesPaid/1');
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
}



