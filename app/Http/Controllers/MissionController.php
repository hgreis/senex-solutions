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
use PDF;

    
class MissionController extends Controller
{
    // old view with all mission details
    public function viewMissions(Request $request) {
    	$missions = Mission::where('bill_id', null)
            ->orderBy('zielDatum')
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
        $dates = Mission::where('bill_id', null)
            ->select('zielDatum')
            ->orderBy('zielDatum')
            ->distinct()
            ->get();
        if ($request->customer != null) {
            $missions = $missions->where('kunde', $request->customer);
        }
        if ($request->driver != null) {
            $missions = $missions->where('fahrer', $request->driver);
        }
        if ($request->date != null) {
            $missions = $missions->where('zielDatum', $request->date);
        }
        return view('pages.view', compact('missions', 'dates', 'drivers', 'customers'));
    }

    

    public function saveBill(Request $request) {        
        for ($i = 1; $i <= 2; $i++) {
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
                        if($mission->company == $i) {
                            ++$makeBill;
                        }
                    }
                }
                if ($makeBill > 0) {
                    $bill->date = date("d.m.Y");
                    $bill->save();
                    foreach ($customer->missions as $mission) {
                        if(isset($request[$mission->id])) {
                            if($mission->company == $i) {
                                $mission->bill_id = $bill->id;
                                $mission->save();
                                $sum = $sum + $mission->preisKunde;
                                $bill->company = $mission->company;
                            }
                        }
                    }
                    $bill->customer = $customer->name;
                    $bill->priceNet = $sum;
                    $bill->priceGross = $sum * (100+$customer->taxes)/100;
                    $bill->taxes = $customer->taxes;
                    $bill->number = $bill->number();
                    $id = $bill->id;
                    $bill->save();
                    $bill->savePDF($id, $customer);
                    unset($bill);
                }
            }
        }
        return view('pages.menu');
    }

    public function showBill($id) {
        $bill = Bill::find($id);
        if ($bill->company == 2)    {
            return response()->file(public_path('Rechnungen/Sabine Heinrichs Transporte RE-'.$bill->number.'.pdf'));
        }

        return response()->file(public_path('Rechnungen/Strerath Transporte RE-'.$bill->number.'.pdf'));
    }

//muss dringend überarbeitet werden
    public function listInvoices($id) {
        $bills = Bill::where('company', $id)->orderBy('id','desc')->get();
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
        return view('pages.invoices', compact('bills', 'missions', 'id'));
    }

    public function mission_new() {
        $input = new Mission;
        $input->company = 1;
        $choice = 'Touren-Start';
        return view('pages.mission', compact('input', 'choice'));
    }

    public function viewMission($id) {
        $input = Mission::find($id);
        $choice = 'Touren-Start';
        $customers = Customer::all()->sortBy('name');
        $drivers = Driver::all()->sortBy('name');
        return view('pages.mission', compact('input', 'choice', 'customers', 'drivers'));

    }

    public function mission_submit(Request $request) {
        if (isset($request->id)) {
            $input = Mission::find($request->id);
        }
        else {
            $input = new Mission;
        }
        if (isset($request->delete))    {
            $input->delete();
            return view('pages.menu');
        }
        
        $input->fill($request->all());
        $input->save();

        //file upload: order confirmation
        if (isset($request->missionConfirmation)) {
            $file = $request->file('missionConfirmation');
            $destinationPath = 'uploads';
            $file->move($destinationPath, $input->id.' Auftragsbestaetigung.'.$file->getClientOriginalExtension() );    
            $input->missionConfirmation=true;
            $input->save();
        }

        //file upload: delivery note
        if (isset($request->deliveryNote)) {
            $file = $request->file('deliveryNote');
            $destinationPath = 'uploads';
            $file->move($destinationPath, $input->id.' Lieferschein.'.$file->getClientOriginalExtension() );
            $input->deliveryNote=true;
            $input->save();
        }        

        $input = Mission::find($input->id);
        $choice = $request->submit;
        $customers = Customer::all()->sortBy('name');
        $drivers = Driver::all()->sortBy('name');

        if ($choice == 'Speichern/Menu') {
            return view('pages.menu');
        }

        return view('pages.mission', compact('input', 'choice', 'customers', 'drivers'));
    }
    
    public function createBill() {
        // for first company
        $customers = Customer::whereHas('missions', function($query) {
            $query->whereNull('bill_id')->where('company', 1);
        })->with(['missions' => function($query) {
            $query->whereNull('bill_id')->where('company', 1);
        }])->orderBy('name')->get();

        //for second company
        $customers2 = Customer::whereHas('missions', function($query) {
            $query->whereNull('bill_id')->where('company', 2);
        })->with(['missions' => function($query) {
            $query->whereNull('bill_id')->where('company', 2);
        }])->orderBy('name')->get();

        return view('pages.bill', compact('customers', 'customers2'));
    }

    public function viewNoDriver(Request $request)  {
        $missions = Mission::where('bill_id', null)
            ->where('fahrer', null)
            ->orderBy('zielDatum')
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
        $dates = Mission::where('bill_id', null)
            ->select('zielDatum')
            ->orderBy('zielDatum')
            ->distinct()
            ->get();
        if ($request->customer != null) {
            $missions = $missions->where('kunde', $request->customer);
        }
        if ($request->driver != null) {
            $missions = $missions->where('fahrer', $request->driver);
        }
        return view('pages.view', compact('missions', 'dates', 'drivers', 'customers'));    }

    public function viewNoDeliveryNote(Request $request)  {
        $missions = Mission::where('bill_id', null)
            ->where('deliveryNote', null)
            ->orderBy('zielDatum')
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
        $dates = Mission::where('bill_id', null)
            ->select('zielDatum')
            ->orderBy('zielDatum')
            ->distinct()
            ->get();
        if ($request->customer != null) {
            $missions = $missions->where('kunde', $request->customer);
        }
        if ($request->driver != null) {
            $missions = $missions->where('fahrer', $request->driver);
        }
        return view('pages.view', compact('missions', 'dates', 'drivers', 'customers'));    }

}
