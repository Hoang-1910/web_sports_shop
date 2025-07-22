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

    public function getBestPromotionDiscountedPrice()
    {
        $basePrice = $this->price;
        $now = now();
        $promotions = \App\Models\Promotion::where('active', true)
            ->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->get();
        $maxDiscount = 0;
        foreach ($promotions as $promo) {
            $isApplicable = false;
            if ($promo->type === 'global') {
                $isApplicable = true;
            } elseif ($promo->type === 'product' && $promo->products->contains($this->product_id)) {
                $isApplicable = true;
            } elseif ($promo->type === 'category' && $promo->categories->contains($this->product->category_id)) {
                $isApplicable = true;
            }
            if ($isApplicable) {
                $discount = $promo->discount_type === 'percent'
                    ? $basePrice * $promo->discount_value / 100
                    : $promo->discount_value;
                if ($discount > $maxDiscount) {
                    $maxDiscount = $discount;
                }
            }
        }
        return max(0, $basePrice - $maxDiscount);
    }
}
