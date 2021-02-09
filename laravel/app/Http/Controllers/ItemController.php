<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    
    public function index() {
        $items = Item::all();
        return view('items.items', compact('items'));
    }
    


    public function showTable() {
        return view('items');
    }
    


    public function create() {
        return view('items.create');
    }



    public function store(Request $request) {

        $storeData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $items = Item::create($storeData);

        return redirect('/items')->with('completed', 'Item has been saved!');
    
    }
    


    public function show(Item $item) {
        //
    }
    


    public function edit(Item $item) {
        $items = Item::find($item);
        return view('items.edit', compact('item'));
    }
    


    public function update(Request $request, Item $item) {

        $updateData = $request->validate([
            'name' => 'required|max:255',
        ]);

        Item::where('id', $item->id)->update($updateData);
        return redirect('/items')->with('completed', 'Item has been updated');
    
    }

    
    
    public function destroy(Item $item) {

        $file = Item::where('id', $item->id);

        $file->delete();
        return redirect('/items')->with('completed', 'Item has been deleted');
    
    }
}
