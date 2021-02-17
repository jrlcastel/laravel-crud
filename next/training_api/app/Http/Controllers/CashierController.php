<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use Illuminate\Http\Request;

class CashierController extends Controller
{

    public function getCashiers() {
        return response()->json(Cashier::all(), 200);
    }

    public function getCashierByID($id) {
        $cashier = Cashier::find($id);
        if(is_null($cashier)) return response()->json(['message' => 'Cashier not found.'], 404);
        return response()->json($cashier::find($id), 200);
    }
    
    public function index() {
        $cashiers = Cashier::all();
        return view('cashiers.cashiers', compact('cashiers'));
    }

    public function addCashier(Request $request) {
        $item = Cashier::create($request->all());
        return response($item, 201);
    }

    public function updateCashier(Request $request, $id) {
        $item = Cashier::find($id);
        if(is_null($item)) return response()->json(['message' => 'Cashier not found.'], 404);
        $item->update($request->all());
        return response($item, 200);
    }

    public function deleteCashier($id) {
        $item = Cashier::find($id);
        if(is_null($item)) return response()->json(['message' => 'Cashier not found.'], 404);
        $item->delete();
        return response()->json(null,204);
    }

    public function create() {
        return view('cashiers.create');
    }



    public function store(Request $request) {

        $storeData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $cashier = Cashier::create($storeData);

        return redirect('/cashiers')->with('completed', 'cashiers has been saved!');
    
    }



    public function edit(Cashier $cashier) {
        $cashiers = Cashier::find($cashier);
        return view('cashiers.edit', compact('cashier'));
    }
    


    public function update(Request $request, Cashier $cashier) {

        $updateData = $request->validate([
            'name' => 'required|max:255',
        ]);

        Cashier::where('id', $cashier->id)->update($updateData);
        return redirect('/cashiers')->with('completed', 'cashiers has been updated');
    
    }

    
    
    public function destroy(Cashier $cashier) {

        $file = Cashier::where('id', $cashier->id);

        $file->delete();
        return redirect('/cashiers')->with('completed', 'cashiers has been deleted');
    
    }
}
