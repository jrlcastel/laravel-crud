<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    

    public function getReceipts() {
        return response()->json(Receipt::all(), 200);
    }

    public function getReceiptByID($id) {
        $receipt = Receipt::find($id);
        if(is_null($receipt)) return response()->json(['message' => 'Receipt not found.'], 404);
        return response()->json($receipt::find($id), 200);
    }

    public function addReceipt(Request $request) {
        $item = Receipt::create($request->all());
        return response($item, 201);
    }

    public function updateReceipt(Request $request, $id) {
        $item = Receipt::find($id);
        if(is_null($item)) return response()->json(['message' => 'Receipt not found.'], 404);
        $item->update($request->all());
        return response($item, 200);
    }

    public function deleteReceipt($id) {
        $item = Receipt::find($id);
        if(is_null($item)) return response()->json(['message' => 'Receipt not found.'], 404);
        $item->delete();
        return response()->json(null,204);
    }

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
