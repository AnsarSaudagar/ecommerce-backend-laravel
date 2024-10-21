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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Define the foreign key column first
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('name')->nullable(false);
            $table->decimal('price', 10, 2)->nullable(false);
            $table->text('description')->nullable();

            $table->timestamps();

            // Define the foreign keys for created_by and updated_by
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            // Define the foreign key constraints after defining the columns
            $table->foreign('category_id')
                ->references('id')
                ->on('products_categories')
                ->onDelete('set null');

            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreign('updated_by')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
