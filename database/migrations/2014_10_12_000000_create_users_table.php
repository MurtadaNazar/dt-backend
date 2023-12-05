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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('userName');
            $table->string('password');
            $table->enum('type', ['Admin', 'Agent']);
            $table->boolean('status')->default(true);
            $table->string('faceBook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youTube')->nullable();
            $table->string('telegram')->nullable();
            $table->string('imageUrl')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
