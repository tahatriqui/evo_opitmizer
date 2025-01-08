<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Category;
use App\Models\SCategorie;
class CategorieController extends Controller
{
    public function index(){

        $nbrorder = Order::count();
        $categories = Category::paginate(10);

        return view("admin.Categories",compact('nbrorder','categories'));
    }
    public function ajouter()
    {
        $nbrorder = Order::count();
         return view("admin.ajouter_cat",compact('nbrorder'));
    }

    public function store(Request $request)
    {
    // Validation
    $request->validate([
        'nom_cat' => 'required|string|max:255',
        'image' => 'nullable|image|max:1024',
    ]);

    // Create product
    $categorie = new Category();
    $categorie->nom_cat = $request->nom_cat;

    
     
if ($request->hasFile('img_cat')) {
    // Récupérer le fichier uploadé
    $image = $request->file('img_cat');

    // Générer un nom unique pour l'image
    $imageName = time() . '.' . $image->getClientOriginalExtension();

    // Chemin vers le dossier 'public_html/images'
    $destinationPath = base_path('../public_html/images');

    // Déplacer l'image vers le dossier cible
    $image->move($destinationPath, $imageName);

    // Enregistrer le chemin relatif de l'image dans la base de données
    $categorie->img_cat = $imageName;
}


    $categorie->save();

    // Redirect or return a response
    return redirect()->route('dashboard')->with('success', 'categorie ajouté avec succès');
}
public function destroy($id)
    {
        $categorie = Category::findOrFail($id);
        $categorie->delete();

        return redirect()->route('admin.categorie')->with('success', 'categorie supprimé avec succès');
    }

    public function edit($id)
    {
        // Retrieve the product by its ID
        $categorie = Category::findOrFail($id);
        // Count the number of orders
        $nbrorder = Order::count();
        // Return the view with the necessary data
        return view('admin.edit_cat', compact('categorie','nbrorder'));
    }
    public function update(Request $request, $id)
    {
        // Validate the incoming request

        $categorie = Category::findOrFail($id);
        $categorie->update([
            'nom_cat' => $request->nom_cat,
            'img_cat'=>$request->img_cat]);

        // Redirect with success message
        return redirect()->route('admin.categorie')->with('success', 'categorie mis à jour avec succès');
    }

//les sous categorie
public function ajoute_Scategorie($id){
    $nbrorder = Order::count();
    $category = Category::find($id);
    $scategories = $category->SCategory;
     return view('admin.Scategories',compact('nbrorder','category','scategories'));
}

//supprimer le sous category
public function delete_scat($id){

SCategorie::find($id)->delete();
return redirect()->back();
}


    //ajouter un sous category
    public function ajoute_scat($id){
        $nbrorder = Order::count();
        $category = Category::find($id);
        return view('admin.ajoute_scat',compact('nbrorder','category'));
    }
//post sous category
    public function add_scat(Request $req){
        $nbrorder = Order::count();

         $req->validate([
        'nom_scat' => 'required|string|max:25',
        'cat' => 'required',
    ]);

    // Create the new subcategory
    SCategorie::create([
        'name' => $req->nom_scat,  // 'name' is the column in the database
        'category_id' => $req->cat, // 'category_id' is the foreign key column
    ]);
        return redirect()->back();
    }
}



