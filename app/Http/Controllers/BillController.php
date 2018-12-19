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

    public function printPDF($id) {
    	$bill = Bill::find($id);
    	$bill->priceNet = Mission::where('bill_id', $id)->sum('preisKunde');
    	$bill->priceGross = $bill->priceNet * $bill->taxes/100;
    	$bill->save();
    	$bill->savePDF();
    	return 'Es wurde eine neue PDF erzeugt';
    }
}



