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
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            /* creo campos para las FK */
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');
            /* le digo a donde hacen referencias dichos campos antes creados */
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade'); //poner en plural el nomb de la tabla q ac referncia
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
