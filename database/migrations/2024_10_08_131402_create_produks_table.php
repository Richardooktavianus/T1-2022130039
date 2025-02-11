<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->char('id', 12)->primary();
            $table->string('product_name', 255);
            $table->text('description')->nullable();
            $table->double('retail_price', 8, 2)->default(0.0);
            $table->double('wholesale_price', 8, 2)->default(0.0);
            $table->char('origin', 2);
            $table->unsignedInteger('quantity')->default(0);
            $table->text('photo')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
