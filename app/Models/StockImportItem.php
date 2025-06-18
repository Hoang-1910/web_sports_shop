<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockImportItem extends Model
{
    protected $fillable = [
        'stock_import_id',
        'product_id',           // Có thể NULL nếu chỉ dùng variant
        'product_variant_id',   // Có thể NULL nếu chỉ nhập sản phẩm cha
        'quantity',
        'import_price',
    ];

    // Phiếu nhập cha
    public function import()
    {
        return $this->belongsTo(StockImport::class, 'stock_import_id');
    }

    // Sản phẩm cha (nếu không có biến thể)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Biến thể (nếu nhập theo variant)
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
}
