<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // 支払状況
    public function up(): void
    {
        Schema::create('statuses', function (Blueprint $table) {
            // $table->id();
            $table->tinyinteger('code')->primary();
            $table->string('status');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};
