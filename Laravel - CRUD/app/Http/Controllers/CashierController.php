<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    
    public function index() {
        $cashiers = Cashier::all();
        return view('cashiers.cashiers', compact('cashiers'));
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
