<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'address', 'phone', 'email', 'note',
    ];

    public function stockImports()
    {
        return $this->hasMany(StockImport::class);
    }
} 