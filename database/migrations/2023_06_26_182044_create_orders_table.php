<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // 注文一覧
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            // $table->id();
            $table->integer('order_no'); // 商品別に行が増える感じ？
            $table->foreignId('user_id')->constrained();
            $table->string('goods_code');
                $table->foreign('goods_code')->references('code')->on('goods');
            $table->integer('quantity'); // 数量
            // $table->integer('total'); // 合計金額…必要か？
            $table->tinyinteger('status_code');
                $table->foreign('status_code')->references('code')->on('statuses');
            $table->timestamps(); // created_at = 注文日
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
