<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'discount',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function stockImportItems()
    {
        return $this->hasMany(StockImportItem::class, 'product_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Nếu muốn truy vấn tổng số đã nhập:
    public function totalImported()
    {
        return $this->stockImportItems()->sum('quantity');
    }

    public function getDiscountedPrice(): float
    {
        $now = now();
        $promotions = \App\Models\Promotion::where('active', true)
            ->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->get();

        $discount = 0;
        foreach ($promotions as $promo) {
            if (
                ($promo->type === 'global') ||
                ($promo->type === 'product' && $promo->products->contains($this->id)) ||
                ($promo->type === 'category' && $promo->categories->contains($this->category_id)) ||
                ($promo->type === 'supplier' && isset($this->supplier_id) && $promo->suppliers->contains($this->supplier_id))
            ) {
                if ($promo->discount_type === 'percent') {
                    $discount = max($discount, $this->price * $promo->discount_value / 100);
                } else {
                    $discount = max($discount, $promo->discount_value);
                }
            }
        }
        return max(0, $this->price - $discount);
    }
}
