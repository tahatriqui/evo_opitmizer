<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\SCategorie;


class CommandController extends Controller
{
    public function index(){
        $nbrorder = Order::count();
        $orders = Order::paginate(10);
    return view('admin.commande',compact('orders',"nbrorder"));
    }

    public function destroy($id) {
            Order::find($id)->delete();
    return redirect()->back()->with(['delete' => "order a été supprimer"]);
    }
}
