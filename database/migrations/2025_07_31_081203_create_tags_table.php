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
      Schema::create('taggables', function (Blueprint $table) {
    $table->unsignedBigInteger('tag_id');
    $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
    $table->unsignedBigInteger('taggable_id'); // ← ini yang perlu kamu ubah
    $table->string('taggable_type');
    $table->timestamps();
    // Index penting untuk morphToMany
    $table->index(['taggable_id', 'taggable_type']);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taggables');
    }
};
