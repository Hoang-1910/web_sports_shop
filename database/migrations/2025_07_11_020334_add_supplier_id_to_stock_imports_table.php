<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('stock_imports', function (Blueprint $table) {
        $table->unsignedBigInteger('supplier_id')->after('user_id');

        // Nếu có ràng buộc khoá ngoại
        $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('stock_imports', function (Blueprint $table) {
        $table->dropForeign(['supplier_id']);
        $table->dropColumn('supplier_id');
    });
}
};
