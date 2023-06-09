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
        Schema::create('inputs', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->default(0);
            $table->timestamps();

            $table->foreignId('reference_id')->constrained('products');
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('presentation_id')->constrained('presentations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inputs');
    }
};
