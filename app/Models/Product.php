<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_pro',        // Example product name
        'dec_pro',    // Example product description
        'img_pro',        // Example image field
        'categorie_id',   // Foreign key for category
        'scategorie_id',  // Foreign key for subcategory
    ];
    public function Category()
   {
       return $this->belongsTo(Category::class);
   }
    public function sCategory()
   {
       return $this->belongsTo(SCategorie::class,"scategorie_id");
   }
    public function details()
    {
        return $this->hasMany(Detail::class, 'product_id');
    }
}
