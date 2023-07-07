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

            $table->foreignId('reference_id')->constrained('references')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('presentation_id')->constrained('presentations')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
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
