<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasedCarPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchased_car_parts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_part_id')->unsigned();
            $table->foreign('car_part_id')->references('id')->on('car_parts');
            $table->integer('amount');
            $table->integer('purchase_id')->unsigned();
            $table->foreign('purchase_id')->references('id')->on('purchases');
            $table->decimal('purchase_price_without_vat', 10, 2);
            $table->decimal('store_price_without_vat', 10, 2);
            $table->timestamps();
            $table->softDeletes();
            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchased_car_parts');
    }
}
