<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // 在庫テーブル
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            // $table->id(); // 主キー = 外部キー
            $table->string('goods_code')->primary();
            $table->foreign('goods_code')->references('code')->on('goods');
            $table->integer('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
