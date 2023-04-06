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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->double('total_price', 10, 2);
            $table->integer('rate')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
          
    
            $table->string('email', 20);
            $table->string('phone', 20);
            $table->string('name_contact', 100);
            $table->integer('zipcode');
            $table->string('city');
            $table->string('address');
            $table->string('cardname');
            $table->string('cardnumber');
            $table->string('expmonth');
            $table->string('expyear');
            $table->string('cvv');
            $table->dateTime('order_date')->useCurrent();
      
      
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
