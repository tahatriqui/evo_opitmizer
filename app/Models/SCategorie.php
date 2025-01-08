<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SCategorie extends Model
{
    use HasFactory;

    protected $fillable = ["category_id","name"];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
