<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $nbrorder = Order::count();
    return view('dashboard', compact('nbrorder'));
    }
}
