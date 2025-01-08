<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Detail;
use App\Models\Parametre;
class DetailController extends Controller
{
    public function index($id){
            $product = Product::find($id);
        $categories = Category::all();
        $details = Detail::where('product_id', $product->id)->get();
        $parametres=Parametre::where('product_id', $product->id)->get();
        // Liste de toutes les colonnes de la table
            $columns = [
        'Poids en ordre de marche (kg)','Capacité du godet (m³)','Puissance nominale (kW)','Charge nominale (kg)','Charge du godet (m³)',
        'Lame semi-U (m3)','Largeur de voie (mm)','Capacité de levage nominale (t)','Flèche allongée (m)','Puissance du moteur (kW/tr/min)'
    ];

        // Créer une collection pour les détails filtrés
        $filteredDetails = $details->map(function ($detail) use ($columns) {
            // Filtrer les colonnes non nulles
            $nonNullColumns = collect($columns)->filter(function ($column) use ($detail) {
                return !is_null($detail->{$column});
            });
            // Retourner toutes les colonnes non nulles pour cet enregistrement
            return $detail->only($nonNullColumns->toArray());
        })->filter(); // Filtrer les résultats non nuls

        // Passer les données à la vue
        return view('product.ProductDetail', compact('product', 'categories', 'filteredDetails','parametres'));

    }
}