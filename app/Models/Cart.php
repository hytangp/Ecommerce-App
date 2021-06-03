<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Cart extends Model
{
    use HasFactory;
    
    protected $table = 'carts';

    protected $fillable = [
        'product_id',
        'user_id',
    ];

    public function products() {
        return $this->BelongsTo(Product::class, 'product_id', 'id');
    }
   
}
