<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // ユーザー情報テーブル
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(); // 外部キー制約、簡潔な書き方
            // $table->string('name'); usersテーブル側で登録するはず
            // $table->string('mail_local'); usersテーブル側で登録するはず // @より前
            // $table->string('mail_domain'); usersテーブル側で登録するはず // @より後
            $table->string('prefecture');
            $table->foreign('prefecture')->references('prefecture')->on('prefectures');
            $table->string('address', 100)->nullable(); // 登録済みかどうか判定する処理が必要になる
            $table->tinyinteger('tel');
            $table->tinyinteger('authority_code');
            $table->foreign('authority_code')->references('code')->on('authorities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
