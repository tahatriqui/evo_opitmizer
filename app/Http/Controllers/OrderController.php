<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

class OrderController extends Controller
{
    public function index ($id,$name){
        
        $categories = Category::all();
        $spesificcat = Category::where('id','=',$id)->first()->nom_cat; 
        return view('order.Form',compact('categories','spesificcat','name'));
        
    }

    public function insert(Request $req){
       {
    $filed = $req->validate([
        'prod_cat' => 'required|string',
        'prod_mod' => 'required|string',
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15', // Adjust max length as necessary
        'email' => 'required|email',
        'country' => 'required|string|max:100', // Adjust max length as necessary
        'message' => 'nullable|string|max:1000', // Assuming you want to allow long messages
       
    ]);

    Order::create($filed);
     return redirect()->back()->with('success', 'Order created successfully!');

    }}
}
