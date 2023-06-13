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
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('extract')->nulable();
            $table->longText('body')->nulable();
            $table->enum('status', [1, 2])->default(1);
            /* creo campos para las FK */
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');   
            /* le digo a donde hacen referencias dichos campos antes creados */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //poner en plural el nomb de la tabla q ac referncia
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();
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
