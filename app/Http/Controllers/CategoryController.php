<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Detail;
class CategoryController extends Controller
{
    public function liste()
    {
        $categories = Category::all();

        return view('category.liste', compact('categories'));
    }
    public function search (Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('nom_pro', 'LIKE', '%' . $query . '%')->get();
        $categories = Category::all();

        // Récupérer les détails pour tous les produits récupérés
        $details = Detail::whereIn('product_id', $products->pluck('id'))->get();
         $allColumns = DB::getSchemaBuilder()->getColumnListing('details');
        // Exclure les colonnes "id" et "product_id"
        $columns = collect($allColumns)->reject(function ($column) {
            return in_array($column, ['id', 'product_id']);
        })->toArray();

        // Créer une collection pour les détails filtrés
        $filteredDetails = [];

        // Parcourir chaque produit pour obtenir ses détails
        foreach ($products as $product) {
            $productDetails = $details->where('product_id', $product->id);

            // Parcourir chaque enregistrement de détails pour choisir trois colonnes non nulles
            $finalDetail = $productDetails->map(function ($detail) use ($columns) {
                // Filtrer les colonnes non nulles
                $nonNullColumns = collect($columns)->filter(function ($column) use ($detail) {
                    return !is_null($detail->{$column});
                });

                // Si on a au moins 3 colonnes non nulles, on en choisit 3 aléatoirement
                if ($nonNullColumns->count() >= 1) {
            // Limiter au maximum 3 colonnes non nulles aléatoires (ou toutes si moins de 3)
            $selectedColumns = $nonNullColumns->take(3)->toArray();
            // Retourner uniquement les colonnes sélectionnées pour cet enregistrement
            return $detail->only($selectedColumns);
        }
                return null; // Sinon, on ne retourne rien
            })->filter(); // Filtrer les résultats non nuls

            // Limiter à 3 enregistrements
            $finalDetails = $finalDetail->take(3);

            // Ajouter les détails filtrés pour ce produit dans le tableau
            $filteredDetails[$product->id] = [
                'product' => $product,
                'details' => $finalDetails
            ];
        }

          return view('category.search', compact('products', 'filteredDetails','categories'));
    }
}