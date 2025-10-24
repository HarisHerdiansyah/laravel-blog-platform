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
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('post_id')->primary();
            $table->uuid('category_id');
            $table->string('title', length: 255);
            $table->string('slug', length: 255);
            $table->text('summary');
            $table->longText('content');
            $table->enum('status', ['draft', 'published']);
            $table->string('thumbnail', length: 255)->nullable();
            $table->timestamps('');
            $table->foreign('category_id')->references('category_id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
