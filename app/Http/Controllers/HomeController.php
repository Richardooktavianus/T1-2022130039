<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $product_name = 'Ayam';
        return view('dashboard',compact('product_name'));
    }
    public function getProduct($id = 001,$sn=-1){
        // if($id < 0){
        //     abort(404);
        // }
        return view('product-detail',compact('id','sn'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|min:10'
        ]);
        return $request->name;
    }
}
