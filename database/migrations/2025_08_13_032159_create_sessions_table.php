<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();                 // セッションID
            $table->foreignId('user_id')->nullable()->index(); // ログイン中のユーザーID
            $table->string('ip_address', 45)->nullable();    // 接続元IP
            $table->text('user_agent')->nullable();          // ブラウザや端末情報
            $table->longText('payload');                     // セッションデータ本体
            $table->integer('last_activity')->index();       // 最終アクセス時刻（UNIXタイム）
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
