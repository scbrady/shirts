<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();

            $table->string('name');
            $table->string('email');
            $table->string('address1');
            $table->string('city');
            $table->string('state');
            $table->string('zip');


            $table->integer('quantity');
            $table->json('extra')->nullable();

            $table->integer('amount');
            $table->string('stripe_id');
            $table->boolean('fulfilled')->default(0);

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
        Schema::dropIfExists('orders');
    }
}
