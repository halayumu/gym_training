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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('part', 10);
            $table->string('trainingExerciseName', 20);
            $table->string('set', 10);
            $table->string('rep', 10);
            $table->string('weight', 10);
            $table->integer('chairHeight')->nullable(true);
            $table->string('supportHeight', 100)->nullable(true);
            $table->string('memo', 255)->nullable(true);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
