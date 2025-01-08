<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\SCategorie;
class ProductController extends Controller
{
    public function index(){

      $products = Product::paginate(10);
    $nbrorder = Order::count();
     $categories = Category::all();

        return view("admin.Products",compact('products','nbrorder','categories'));
    }
    public function ajouter()
    {
        $nbrorder = Order::count();
         $categories = Category::all();
         $scategories=SCategorie::all();
         return view("admin.ajouter_pro",compact('nbrorder','categories','scategories'));
    }
    public function store(Request $request)
{
    // Validation
    $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:1024',
        'categorie_id' => 'required|exists:categories,id',
        'scategorie_id' => 'required|exists:s_categories,id',

    ]);

    // Create product
    $product = new Product();
    $product->nom_pro = $request->nom;
    $product->dec_pro = $request->description;
    $product->category_id = $request->categorie_id;
    $product->scategorie_id = $request->scategorie_id;

    // Handle image upload if provided
  if ($request->hasFile('image')) {
     if ($request->hasFile('image')) {
        // Get the uploaded file
        $image = $request->file('image');

        // Generate a unique name for the image (you can also use time(), uniqid(), etc.)
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = base_path('../public_html/images');

        // Déplacer l'image vers le dossier cible
         $image->move($destinationPath, $imageName);

        // Save the relative path of the image in the database (just 'images/filename')
        $product->img_pro =$imageName;
    }
}

$product->save();

    // Redirect or return a response
    return redirect()->route('dashboard')->with('success', 'Produit ajouté avec succès');
}
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.product')->with('success', 'Produit supprimé avec succès');
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
    public function update(Request $request, $id)
    {
        // Validate the incoming request

        $product = Product::findOrFail($id);
        $product->update([
            'nom_pro' => $request->nom_pro,
            'dec_pro' => $request->dec_pro,
            'category_id' => $request->category_id,
            'scategorie_id' => $request->scategorie_id,
            'img_pro'=>$request->img_pro]);

        // Redirect with success message
        return redirect()->route('admin.product')->with('success', 'Produit mis à jour avec succès');
    }
}


