<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('new_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('part');
            $table->boolean('is_deleted')->default(0); // 削除フラグ（論理削除: 1=削除, 0=有効）
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade'); // 外部キー制約（usersテーブルのidに関連付ける）
            $table->timestamps(); // created_at, updated_at 自動追加
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
