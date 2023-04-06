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
        Schema::create('order_details', function (Blueprint $table) {

          $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
          $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
          $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

          $table->double('price', 10, 2);
          $table->integer('quantity');
          $table->integer('weight');

            $table->id();
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
        Schema::dropIfExists('order_details');
    }
};
