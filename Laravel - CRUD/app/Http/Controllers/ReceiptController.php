<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    
    public function index() {
        $receipts = Receipt::all();
        return view('receipts.receipts', compact('receipts'));
    }

    public function create() {
        return view('receipts.create');
    }



    public function store(Request $request) {

        $storeData = $request->validate([
            'customer_id' => 'required|max:255',
            'cashier_id' => 'required|max:255',
            'total' => 'required|max:255',
        ]);

        $receipt = Receipt::create($storeData);

        return redirect('/receipts')->with('completed', 'receipts has been saved!');
    
    }



    public function edit(Receipt $receipt) {
        $receipts = Receipt::find($receipt);
        return view('receipts.edit', compact('receipt'));
    }
    


    public function update(Request $request, Receipt $receipt) {

        $updateData = $request->validate([
            'customer_id' => 'required|max:255',
            'cashier_id' => 'required|max:255',
            'total' => 'required|max:255',
        ]);

        Receipt::where('id', $receipt->id)->update($updateData);
        return redirect('/receipts')->with('completed', 'receipt has been updated');
    
    }

    
    
    public function destroy(Receipt $receipt) {

        $file = Receipt::where('id', $receipt->id);

        $file->delete();
        return redirect('/receipts')->with('completed', 'receipt has been deleted');
    
    }
}
