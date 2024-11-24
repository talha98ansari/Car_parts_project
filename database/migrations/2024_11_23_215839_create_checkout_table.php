<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->id();
            $table->integer('us er_id'); // User's full name
            $table->string('full_name'); // User's full name
            $table->string('email'); // User's email address
            $table->string('address'); // Shipping address
            $table->string('city'); // User's city
            $table->string('payment_method'); // Payment method (e.g., credit_card, paypal, cod)
            $table->decimal('subtotal', 10, 2); // Subtotal amount
            $table->decimal('tax', 10, 2); // Tax amount
            $table->decimal('total', 10, 2); // Total amount
            $table->string('status')->default('pending');
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkout');
    }
}
