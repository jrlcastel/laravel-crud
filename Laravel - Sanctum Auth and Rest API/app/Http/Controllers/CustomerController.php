<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{


    public function getCustomers() {
        return response()->json(Customer::all(), 200);
    }

    public function getCustomerByID($id) {
        $customer = Customer::find($id);
        if(is_null($customer)) return response()->json(['message' => 'Customer not found.'], 404);
        return response()->json($customer::find($id), 200);
    }

    public function addCustomer(Request $request) {
        $item = Customer::create($request->all());
        return response($item, 201);
    }

    public function updateCustomer(Request $request, $id) {
        $item = Customer::find($id);
        if(is_null($item)) return response()->json(['message' => 'Customer not found.'], 404);
        $item->update($request->all());
        return response($item, 200);
    }

    public function deleteCustomer($id) {
        $item = Customer::find($id);
        if(is_null($item)) return response()->json(['message' => 'Customer not found.'], 404);
        $item->delete();
        return response()->json(null,204);
    }
    
    public function index() {
        $customers = Customer::all();
        return view('customers.customers', compact('customers'));
    }
    


    public function showTable() {
        return view('customers');
    }
    


    public function create() {
        return view('customers.create');
    }



    public function store(Request $request) {

        $storeData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $customers = Customer::create($storeData);

        return redirect('/customers')->with('completed', 'customer has been saved!');
    
    }
    


    public function show(Customer $customer) {
        //
    }
    


    public function edit(Customer $customer) {
        $customers = Customer::find($customer);
        return view('customers.edit', compact('customer'));
    }
    


    public function update(Request $request, Customer $customer) {

        $updateData = $request->validate([
            'name' => 'required|max:255',
        ]);

        Customer::where('id', $customer->id)->update($updateData);
        return redirect('/customers')->with('completed', 'Customer has been updated');
    
    }

    
    
    public function destroy(Customer $customer) {

        $file = Customer::where('id', $customer->id);

        $file->delete();
        return redirect('/customers')->with('completed', 'Customer has been deleted');
    
    }
}
