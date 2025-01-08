<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Parametre;
use App\Models\Product;
class ParametreController extends Controller
{
     public function index ()
    {
        $nbrorder = Order::count();
        $parametres = Parametre::paginate(15);
        $categories = Category::all();
        return view("admin.Parametre",compact('nbrorder','parametres','categories'));
    }
     public function ajouter()
    {
        $nbrorder = Order::count();
         $produits = Product::all();
         return view("admin.ajouter_par",compact('nbrorder','produits'));
    }

    public function store(Request $request)
    {
        // Create product
        $Parametre = new Parametre();
        $Parametre->Article = $request->Article;
        $Parametre->Unité = $request->Unité;
        $Parametre->Paramètre = $request->Paramètre;
        $Parametre->product_id = $request->product_id;


        $Parametre->save();

        // Redirect or return a response
        return redirect()->route('dashboard')->with('success', 'Parametre ajouté avec succès');
    }
    public function destroy($id)
    {
        $Parametre = Parametre::findOrFail($id);
        $Parametre->delete();

        return redirect()->route('admin.Parametre')->with('success', 'Parametre supprimé avec succès');
    }

    public function edit($id)
    {
        // Retrieve the product by its ID
        $produit = Product::findOrFail($id);

        // Retrieve all categories and subcategories
        $categories = Category::all();
        $scategories=SCategorie::all();

        // Count the number of orders
        $nbrorder = Order::count();

        // Retrieve the category and subcategory of the product
        $categorie = $produit->Category; // Assuming the relationship is defined as 'category' in Product model
        $sousCategorie = $produit->sCategory; // Assuming the relationship is defined as 'sousCategorie' in Product model

        // Return the view with the necessary data
        return view('admin.edit_pro', compact('produit', 'categories', 'scategories', 'categorie', 'sousCategorie', 'nbrorder'));
    }
}
