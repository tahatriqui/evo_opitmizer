<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SCategorie;
use App\Models\Detail;
use Illuminate\Support\Collection;
use App;
use Illuminate\Pagination\Paginator;
use Session;
class ProductController extends Controller
{
    // code pour index.product
 public function index($id)
{
    // Fetch products and categories
    $products = Product::where('category_id', $id)->get();

$categorie = Category::where('id', $id)->first();
    $categories = Category::all();
    $scategories = Category::find($id)?->SCategory ?? collect();

    // Fetch details and filter
    $details = Detail::whereIn('product_id', $products->pluck('id'))->get();
    $allColumns = DB::getSchemaBuilder()->getColumnListing('details');
    $columns = collect($allColumns)->reject(fn($column) => in_array($column, ['id', 'product_id','updated_at','created_at']));

    $filteredDetails = $products->map(function ($product) use ($details, $columns) {
        $productDetails = $details->where('product_id', $product->id);
        $finalDetail = $productDetails->map(function ($detail) use ($columns) {
            $nonNullColumns = $columns->filter(fn($column) => !is_null($detail->{$column}))->take(3);
            return $nonNullColumns->isNotEmpty() ? $detail->only($nonNullColumns->toArray()) : null;
        })->filter()->take(3);

        return [
            'product' => $product,
            'details' => $finalDetail,
        ];
    });

    // Paginate the filtered results
    $filteredDetails = $this->paginateCollection($filteredDetails, 9);

    return view('product.index', compact('categories', 'filteredDetails', 'id', 'scategories','categorie'));
}

private function paginateCollection(Collection $items, int $perPage)
{
    $currentPage = Paginator::resolveCurrentPage() ?? 1;
    $currentItems = $items->forPage($currentPage, $perPage);

    return new \Illuminate\Pagination\LengthAwarePaginator(
        $currentItems,
        $items->count(),
        $perPage,
        $currentPage,
        ['path' => Paginator::resolveCurrentPath()]
    );
}



 public function filter($cid, $id, $productname = null)
{
    $categorie = Category::where('id', $id)->first();
    // Fetch all categories
    $categories = Category::all();

    // Get the subcategories for the given category ID
    $scategories = Category::find($id)->SCategory;

    // Start building the product query by filtering on scategorie_id
    $query = Product::where('scategorie_id', $cid);

    // Add the product name filter if provided
    if ($productname) {
        $query->where(function ($query) use ($productname) {
            $query->where('nom_pro', 'like', '%' . $productname . '%')
                  ->orWhereRaw('LOWER(nom_pro) = ?', [strtolower($productname)]);
        });
    }

    // Execute the query
    $products = $query->get();

    // Fetch product details for the retrieved products
    $details = Detail::whereIn('product_id', $products->pluck('id'))->get();

    $allColumns = DB::getSchemaBuilder()->getColumnListing('details');

    // Exclude columns "id" and "product_id"
    $columns = collect($allColumns)->reject(function ($column) {
        return in_array($column, ['id', 'product_id', 'created_at', 'updated_at']);
    })->toArray();

    // Prepare the filtered details
    $filteredDetails = $products->map(function ($product) use ($details, $columns) {
        $productDetails = $details->where('product_id', $product->id);

        $finalDetail = $productDetails->map(function ($detail) use ($columns) {
            // Filter columns with non-null values
            $nonNullColumns = collect($columns)->filter(function ($column) use ($detail) {
                return !is_null($detail->{$column});
            });

            // Select 3 random columns if there are at least 3 non-null values
            if ($nonNullColumns->count() >= 3) {
                $randomColumns = $nonNullColumns->random(3)->toArray();
                return $detail->only($randomColumns);
            }
            return null;
        })->filter();

        // Limit to 3 records
        $finalDetails = $finalDetail->take(3);

        return [
            'product' => $product,
            'details' => $finalDetails,
        ];
    });

    // Paginate the filtered results
    $perPage = 9;
    $currentPage = Paginator::resolveCurrentPage();
    $filteredDetailsPaginator = new \Illuminate\Pagination\LengthAwarePaginator(
        $filteredDetails->forPage($currentPage, $perPage),
        $filteredDetails->count(),
        $perPage,
        $currentPage,
        ['path' => Paginator::resolveCurrentPath()]
    );

    return view("product.filtered", compact('id', 'cid', 'categories', 'filteredDetailsPaginator', 'scategories','categorie'));
}
}