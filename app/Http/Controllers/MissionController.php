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
                    $bill->savePDF();
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

    public function listInvoices($id) {
        $bills = Bill::where('company', $id)->orderBy('id','desc')->get();
        return view('pages.invoices', compact('bills', 'id'));
    }

    public function paidInvoices($id)   {
        $bills = Bill::where('company', $id)
            ->where('paid', null)
            ->orderBy('id','desc')
            ->get();
        return view('pages.invoicesPaid', compact('bills', 'id'));
    }

    public function mission_new() {
        $input = new Mission;
        $input->company = 1;
        $choice = 'Touren-Start';
        return view('pages.mission', compact('input', 'choice'));
    }

    public function mission_newDate($date) {
        $input = new Mission;
        $input->company = 1;
        $input->startDatum = $date;
        $input->zielDatum = $date;
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

    public function viewMissionDriver($id) {
        $input = Mission::find($id);
        $choice = 'Fahrer/Unternehmer';
        $customers = Customer::all()->sortBy('name');
        $drivers = Driver::all()->sortBy('name');
        return view('pages.mission', compact('input', 'choice', 'customers', 'drivers'));
    }

    public function viewMissionCustomer($id) {
        $input = Mission::find($id);
        $choice = 'Kunde';
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
            $query->whereNull('bill_id')
                ->whereNull('bill_paid')
                ->where('company', 1);
        })->with(['missions' => function($query) {
            $query->whereNull('bill_id')
                ->whereNull('bill_paid')
                ->where('company', 1);
        }])->orderBy('name')->get();

        //for second company
        $customers2 = Customer::whereHas('missions', function($query) {
            $query->whereNull('bill_id')
                ->whereNull('bill_paid')
                ->where('company', 2);
        })->with(['missions' => function($query) {
            $query->whereNull('bill_id')
                ->whereNull('bill_paid')
                ->where('company', 2);
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
        return view('pages.view', compact('missions', 'dates', 'drivers', 'customers'));    
    }

    public function overview($id) {
        $mission = Mission::find($id);
        if(isset($mission->bill_id))    {
            $mission->bill_number = Bill::find($mission->bill_id)->number;
            $mission->bill_price = Bill::find($mission->bill_id)->priceGross;
        }
        return view('pages.mission_overview', compact('mission'));
    }

    public function unpaidMissions($company) {
        $missions = Mission::where('bill_id', null)
                        ->where('bill_paid', null)
                        ->where('company', $company)
                        ->orderBy('startDatum')
                        ->get()
                        ->sortBy('kunde')
                        ->groupBy('kunde');
        $missions->company = $company;
        return view('pages.missionsPaid', compact('missions'));
    }

    public function payMission($id) {
        $mission = Mission::find($id);
        $mission->bill_paid = now();
        $mission->save();
        return redirect('/unpaidMissions/'.$mission->company);
    }

    public function payDriverList($company) {
        $missions = Mission::where('company', $company)
                    ->whereNull('credit')
                    ->whereNull('credit_paid')
                    ->whereNotNull('fahrer')
                    ->orderBy('startDatum')
                    ->get()
                    ->sortBy('fahrer')
                    ->groupBy('fahrer');
        $missions->company = $company;
        return view('pages.missionsPayDriver', compact('missions'));
    }

    public function payDriver($id) {
        $mission = Mission::find($id);
        $mission->credit_paid = now();
        $mission->save();
        return redirect('/missionsPayDriver/'.$mission->company);
    }

    public function calendar() {
        $missions = Mission::all()
                    ->sortByDesc('startDatum')
                    ->groupBy('startDatum');
        return view('pages.calendar', compact('missions'));
    }

    public function mission_delete($id) {
        $mission = Mission::find($id);
        $mission->delete();
        return;
    }
}
