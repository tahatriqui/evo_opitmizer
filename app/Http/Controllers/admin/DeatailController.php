<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\SCategorie;
use App\Models\Detail;

class DeatailController extends Controller
{
    public function index ()
    {
        $nbrorder = Order::count();
        $categories = Category::all();
        $details = Detail::paginate(15);

        return view("admin.detail",compact('details','nbrorder','categories'));
    }
    
    public function delete($id)
    {
        Detail::find($id)->delete();
        return redirect()->back()->with('delete',"details deleted seccucfully");
    }
}
