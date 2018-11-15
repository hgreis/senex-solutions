<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bill;
    
class BillController extends Controller
{
    public function payBill($id) {
        Bill::find($id)->update(['paid' => now()]);
        $company = Bill::find($id)->company;
        if ($company == 2)  {
        return redirect('/invoicesPaid/2');
        }
        return redirect('/invoicesPaid/1');
    }
}