<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('product_type_id');

            $table->string('name');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('pdf')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->foreign('product_type_id')
                ->references('id')
                ->on('product_types')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};