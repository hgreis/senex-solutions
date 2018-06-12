<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use App\Customer;

class DriverController extends Controller
{
	public function driver() {
    	$drivers = Driver::orderBy('name')->get();
    	return view('pages.drivers', compact('drivers'));
    }

	public function submit(Request $request) {
		$driver = new Driver;
		$driver->fill($request->all());
		$driver->save();
		return redirect(route('drivers.index'));
    }

    public function driverDelete($id) {
        $driver = Driver::find($id);
        $driver->delete();
        return redirect(route('drivers.index'));
    }

    public function customer() {
    	$customers = Customer::orderBy('name')->get();
        $customerToEdit = new Customer;
        return view('pages.customer', compact('customers', 'customerToEdit'));
    }

    public function editCustomer($id) {
        $customers = Customer::orderBy('name')->get();
        $customerToEdit = Customer::find($id);
        return view('pages.customer', compact('customers', 'customerToEdit', 'id'));
    }

    public function saveCustomer(Request $request) {
        if (isset($request->id)) {
            $customer = Customer::find($request->id);
            $customer-> fill($request->all());
            $customer-> save();
        } else {
            $customer = new Customer;
            $customer->fill($request->all());
            $customer->save();
        }
        $customers = Customer::orderBy('name')->get();
        $customerToEdit = new Customer;
        return view('pages.customer', compact('customers', 'customerToEdit'));
    }
}
