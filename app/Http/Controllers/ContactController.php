<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        $categories = Category::all();


        return view('Contact.index', compact('categories'));
    }
    public function send(Request $request)
    {
        $data = $request->validate([
            'Nom' => 'required|string|max:255',
            'Email' => 'required|email|max:255',
            'Message' => 'required|string',
            'Sujet'=>'required|string',
        ]);
        Mail::to('taha @gmail.com')->send(new ContactUs($data));
        // Here you can handle the validated data, for example, send an email or save to the database

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès');
    }
}