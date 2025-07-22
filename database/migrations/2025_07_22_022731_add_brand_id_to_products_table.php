<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id')->after('category_id');

            // Nếu có bảng brands và bạn muốn thiết lập khóa ngoại:
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Nếu có khóa ngoại:
            // $table->dropForeign(['brand_id']);

            $table->dropColumn('brand_id');
        });
    }
};
