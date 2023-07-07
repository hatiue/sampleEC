<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // 注文確定テーブルにuser_idカラム追加
    public function up(): void
    {
        Schema::table('testcarts', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('testcarts', function (Blueprint $table) {
            $table->dropForeign('testcarts_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
