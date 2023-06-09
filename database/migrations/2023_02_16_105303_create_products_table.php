<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('namepro');
            $table->text('short_description');
            $table->text('long_description');
            $table->string('image');
            $table->string('unit')->nullable();
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->integer('store')->nullable();
            $table->integer('sold')->nullable();
            $table->decimal('price');
            $table->decimal('price_discount')->default(0);
            $table->boolean('is_sale')->default(0);
            $table->integer('rate_count')->nullable();
            $table->integer('discount')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
