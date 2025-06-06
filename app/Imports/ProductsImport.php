<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Giả sử file excel có các cột: name, category_id, price, discount, stock, brand, description
        return new Product([
            'name'        => $row['name'],
            'category_id' => $row['category_id'],
            'price'       => $row['price'],
            'discount'    => $row['discount'] ?? 0,
            'stock'       => $row['stock'] ?? 0,
            'brand'       => $row['brand'] ?? null,
            'description' => $row['description'] ?? null,
        ]);
    }
}
