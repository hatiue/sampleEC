<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // 商品マスタテーブル
    public function up(): void
    {
        Schema::create('goods', function (Blueprint $table) {
            //$table->id();
            $table->string('code', 10)->primary(); // F01, F02みたいな想定
            $table->string('name', 50);
            $table->integer('price');
            $table->string('imgurl', 256)->nullable();
            $table->string('description', 256)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods');
    }
};
