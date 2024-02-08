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
        Schema::create('table_sale_books', function (Blueprint $table) {
            $table->id('sale_id');
            $table->unsignedBigInteger('book_id')->index();
            $table->string('title');
            $table->integer('quantity');
            $table->string('price');
            $table->string('amount');

            $table->foreign('book_id')->references('book_id')->on('table_books')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_sale_books');
    }
};
