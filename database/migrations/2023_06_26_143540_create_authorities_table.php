<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // 管理者かユーザーか
    public function up(): void
    {
        Schema::create('authorities', function (Blueprint $table) {
            // $table->id();
            $table->tinyinteger('code')->primary();
            $table->string('authority');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authorities');
    }
};
