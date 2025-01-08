<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     protected $fillable = [
        'nom_cat',        // Example product name
        'img_cat',        // Example image field
    ];
     public function SCategory()
    {
        return $this->hasMany(SCategorie::class);
    }


}
