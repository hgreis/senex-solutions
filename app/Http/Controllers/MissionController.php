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
use PDF;

    
class MissionController extends Controller
{
    public function new() {
    	$drivers = Driver::select('name')
            ->orderBy('name')
            ->distinct()
            ->get();
        $customers = Customer::select('name')
            ->orderBy('name')
            ->distinct()
            ->get();
        $mission = new Mission;
    	return view('pages.new', compact('drivers', 'customers', 'mission'));
    }

    public function submit(Request $request)
    {   
        // this method fills the model with form-data and stores the uploaded fi
        if (isset($request->id)) {
            $mission = Mission::find($request->id);
            $mission->fill($request->all());
            $mission->save();
        } else {
            $mission = new Mission;
        	$mission->fill($request->all());
            $mission->save();
        }
        
        //file upload: order confirmation
        if (isset($request->missionConfirmation)) {
            $file = $request->file('missionConfirmation');
            $destinationPath = 'uploads';
            $file->move($destinationPath, $mission->id.' Auftragsbestaetigung.'.$file->getClientOriginalExtension() );    
            $mission->missionConfirmation=true;
            $mission->save();
        }

        //file upload: delivery note
        if (isset($request->deliveryNote)) {
            $file = $request->file('deliveryNote');
            $destinationPath = 'uploads';
            $file->move($destinationPath, $mission->id.' Ablieferbeleg.'.$file->getClientOriginalExtension() );
            $mission->deliveryNote=true;
            $mission->save();
        }
        
        return view('dekra');
    }

    public function viewMissions(Request $request) {
    	$missions = Mission::where('bill_id', null)
            ->orderBy('startDatum')
            ->get();
        $drivers =  Mission::where('bill_id', null)
            ->select('fahrer')
            ->orderBy('fahrer')
            ->distinct()
            ->get();
        $customers =  Mission::where('bill_id', null)
            ->select('kunde')
            ->orderBy('kunde')
            ->distinct()
            ->get();
        if ($request->customer != null) {
            $missions = $missions->where('kunde', $request->customer);
        }
        if ($request->driver != null) {
            $missions = $missions->where('fahrer', $request->driver);
        }
        return view('pages.view', compact('missions', 'drivers', 'customers'));
    }


    public function viewMission($id) {
        $drivers = Driver::all();
        $customers = Customer::all();
        $mission = Mission::find($id);
        return view('pages.new', compact('drivers', 'customers', 'mission'));
    }

    public function createBill() {
        $customers = Customer::whereHas('missions', function($query) {
            $query->whereNull('bill_id');
        })->with(['missions' => function($query) {
            $query->whereNull('bill_id');
        }])->orderBy('name')->get();
        return view('pages.bill', compact('customers'));
    }

    public function saveBill(Request $request) {
        $customers = Customer::whereHas('missions')
            ->with('missions')
            ->orderBy('name')
            ->get();
        foreach ($customers as $customer) {
            $bill = new Bill;
            $makeBill = 0;
            $sum = 0;
            foreach ($customer->missions as $mission) {
                if(isset($request[$mission->id])) {
                    ++$makeBill;
                }
            }
            if ($makeBill > 0) {
                $bill->date = date("d.m.Y");
                $bill->save();
                foreach ($customer->missions as $mission) {
                    if(isset($request[$mission->id])) {
                        $mission->bill_id = $bill->id;
                        $mission->save();
                        $sum = $sum + $mission->preisKunde;
                    }
                }
                $bill->customer = $customer->name;
                $bill->priceNet = $sum;
                $bill->priceGross = $sum * (100+$customer->taxes)/100;
                $bill->taxes = $customer->taxes;
                $id = $bill->id;
                $bill->save();
                $bill->savePDF($id, $customer);
                unset($bill);
            }
        }
        return view('dekra');
    }

    public function showBill($id) {
        return response()->file(public_path('Rechnungen\Rechnung '.$id.'.pdf'));
    }

//muss dringend überarbeitet werden
    public function listInvoices() {
        $bills = Bill::orderBy('id','desc')->get();
        $missions = array(
            'jan' => Mission::where('zielDatum', '>=', '2018-01-01')->where('zielDatum', '<=', '2018-01-31')->get(),
            'feb' => Mission::where('zielDatum', '>=', '2018-02-01')->where('zielDatum', '<=', '2018-02-28')->get(),
            'mar' => Mission::where('zielDatum', '>=', '2018-03-01')->where('zielDatum', '<=', '2018-03-31')->get(),
            'apr' => Mission::where('zielDatum', '>=', '2018-04-01')->where('zielDatum', '<=', '2018-04-31')->get(),
            'may' => Mission::where('zielDatum', '>=', '2018-05-01')->where('zielDatum', '<=', '2018-05-31')->get(),
            'jun' => Mission::where('zielDatum', '>=', '2018-06-01')->where('zielDatum', '<=', '2018-06-30')->get(),
            'jul' => Mission::where('zielDatum', '>=', '2018-07-01')->where('zielDatum', '<=', '2018-07-31')->get(),
            'aug' => Mission::where('zielDatum', '>=', '2018-08-01')->where('zielDatum', '<=', '2018-08-31')->get(),
            'sep' => Mission::where('zielDatum', '>=', '2018-09-01')->where('zielDatum', '<=', '2018-09-30')->get(),
            'oct' => Mission::where('zielDatum', '>=', '2018-10-01')->where('zielDatum', '<=', '2018-10-31')->get(),
            'nov' => Mission::where('zielDatum', '>=', '2018-11-01')->where('zielDatum', '<=', '2018-11-30')->get(),
            'dec' => Mission::where('zielDatum', '>=', '2018-12-01')->where('zielDatum', '<=', '2018-12-31')->get(),
            'year' => Mission::where('zielDatum', '>=', '2018-01-01')->where('zielDatum', '<=', '2018-12-31')->get(),
             );
        return view('pages.invoices', compact('bills', 'missions'));
    }

    public function mission_new() {
        $input = new Mission;
        $choice = 'Touren-Start';
        return view('pages.mission', compact('input', 'choice'));
    }

    public function mission_submit(Request $request) {
//return $request;
        if (isset($request->id)) {
            $input = Mission::find($request->id);
        }
        else {
            $input = new Mission;
        }
        $input->fill($request->all());
        $input->save();
        $input = Mission::find($input->id);
        $choice = $request->submit;
        $customerToEdit = new Customer;
//return $input;
        return view('pages.mission', compact('input', 'choice', 'customerToEdit'));
    }
}
