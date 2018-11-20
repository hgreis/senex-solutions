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
        $drivers = Driver::whereHas('missions', function($query) {
                $query->whereNotNull('bill_id')
                    ->where('company', 1)
                    ->whereNotNull('bill_paid');
            })->with(['missions' => function($query) {
                $query->whereNotNull('bill_id')
                    ->where('company', 1)
                    ->whereNotNull('bill_paid');
            }])->orderBy('name')->get();

        return $drivers;
    }
}



