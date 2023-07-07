<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // 47都道府県のテーブル
    public function up(): void
    {
        Schema::create('prefectures', function (Blueprint $table) {
            // $table->id();
            $table->string('prefecture', 4)->primary();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prefectures');
    }
};
