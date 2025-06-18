<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockImport extends Model
{
    protected $fillable = [
        'user_id',      // Người thực hiện nhập kho
        'import_date',  // Ngày nhập
        'note',         // Ghi chú
        'total_money',  // Tổng tiền nhập
    ];

    // 1 phiếu nhập có nhiều dòng chi tiết nhập
    public function items()
    {
        return $this->hasMany(StockImportItem::class);
    }

    // Người thực hiện nhập kho
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
