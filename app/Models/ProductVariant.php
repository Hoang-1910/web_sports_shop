<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'size', 'color', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function images()
    {
        return $this->hasMany(ProductVariantImage::class);
    }

    public function stockImportItems()
    {
        return $this->hasMany(StockImportItem::class, 'product_variant_id');
    }

    // Tổng nhập cho variant này:
    public function totalImported()
    {
        return $this->stockImportItems()->sum('quantity');
    }
}
