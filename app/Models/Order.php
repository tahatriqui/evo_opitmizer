<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
        public $fillable =["prod_cat","prod_mod","name","phone","email","country","message"];
}
