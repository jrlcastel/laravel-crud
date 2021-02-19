<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class PageController extends Controller {

    public function index() {
        return view('index');
    }
    
    

    // public function index() {
    //     return view('index');
    // }

}
