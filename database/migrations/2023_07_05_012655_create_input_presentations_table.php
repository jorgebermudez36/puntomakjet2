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
        Schema::create('input_presentations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('input_id')->constrained('inputs');
            $table->foreignId('presentation_id')->constrained('presentations');
            $table->foreignId('product_id')->constrained('inputs');
            $table->foreignId('reference_id')->constrained('inputs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_presentations');
    }
};
