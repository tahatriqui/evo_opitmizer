<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SolutionController extends Controller
{
    public function index()
    {
        $categories=Category::all();
     
        return view('Solution',compact('categories'));
    }
}
