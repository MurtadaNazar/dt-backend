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
            $table->string('userName')->nullable();
            $table->string('passWord');
            $table->enum('type', ['Admin', 'Agent']);
            $table->boolean('status')->default(true);
            $table->string('faceBook');
            $table->string('instagram');
            $table->string('youTube');
            $table->string('telegram');
            $table->string('imageUrl');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('deletedAt')->nullable();
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
