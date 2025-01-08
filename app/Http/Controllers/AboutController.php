<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class AboutController extends Controller
{
    //
    public function index()
    {
        $categories=Category::all();
     
        return view('About',compact('categories'));
    }
}
