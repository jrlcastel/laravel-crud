<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    

    public function getSales() {
        return response()->json(Sale::all(), 200);
    }

    public function getSaleByID($id) {
        $sale = Sale::find($id);
        if(is_null($sale)) return response()->json(['message' => 'Sale not found.'], 404);
        return response()->json($sale::find($id), 200);
    }

    public function addSale(Request $request) {
        $item = Sale::create($request->all());
        return response($item, 201);
    }

    public function updateSale(Request $request, $id) {
        $item = Sale::find($id);
        if(is_null($item)) return response()->json(['message' => 'Sale not found.'], 404);
        $item->update($request->all());
        return response($item, 200);
    }

    public function deleteSale($id) {
        $item = Sale::find($id);
        if(is_null($item)) return response()->json(['message' => 'Sale not found.'], 404);
        $item->delete();
        return response()->json(null,204);
    }


    public function index() {
        $sales = Sale::all();
        return view('sales.sales', compact('sales'));
    }
    
    public function mainIndex() {
        return view('index');
    }
    


    public function showTable() {
        return view('sales');
    }
    


    public function create() {
        return view('sales.create');
    }



    public function store(Request $request) {

        $storeData = $request->validate([
            'item_id' => 'required|max:255',
            'receipt_id' => 'required|max:255',
        ]);

        $customers = Sale::create($storeData);

        return redirect('/sales')->with('completed', 'sale has been saved!');
    
    }
    


    public function show(Sale $sales) {
        //
    }
    


    public function edit(Sale $sale) {
        $sale = Sale::where('id', $sale->id)->first();
        return view('sales.edit', compact('sale'));
    }
    


    public function update(Request $request, Sale $sale) {

        $updateData = $request->validate([
            'item_id' => 'required|max:255',
            'receipt_id' => 'required|max:255',
        ]);

        Sale::where('id', $sale->id)->update($updateData);
        return redirect('/sales')->with('completed', 'sales has been updated');
    
    }

    
    
    public function destroy(Sale $sale) {

        // $post= Sale::where('id', $sales->id)->where('user_id',$user_id)->first();
        // $file = Sale::find($sales);
        // $file = Sale::where('id', $sales->id)->first();
        // $file = Sale::where('id', $sales->id)->first();
        // $file = Customer::where('id', $customer->id);
        // DB::table('sales')->where('id', $sales->id)->delete();

        Sale::where('id', $sale->id)->delete();

        // $file->delete();
        return redirect('/sales')->with('completed', 'sales has been deleted');
    
    }
}
