<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->string('product_name')->nullable();
            $table->string('brand')->nullable();
            $table->string('quantity')->nullable();
            $table->string('budget')->nullable();
            $table->string('amount')->nullable();
            $table->foreign('customer_id')->references('id')->on('test_customers');
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
        Schema::dropIfExists('test_orders');
    }
}
