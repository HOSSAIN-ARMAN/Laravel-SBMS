<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('purchase_id');
            $table->integer('product_id')->nullable();
            $table->string('product_code')->nullable();
            $table->string('manufracture_date')->nullable();
            $table->string('expire_date')->nullable();
            $table->string('quantity')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('total_price')->nullable();
            $table->string('mrp')->nullable();
            $table->foreign('purchase_id')->references('id')->on('purchases');
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
        Schema::dropIfExists('purchase_details');
    }
}
