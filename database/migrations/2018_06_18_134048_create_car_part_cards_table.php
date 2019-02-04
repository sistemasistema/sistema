<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarPartCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_part_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model', 255);
            $table->string('title', 255)->nullable();
            $table->integer('product_subgroup_id')->unsigned();
            $table->foreign('product_subgroup_id')->references('id')->on('product_subgroups');
            $table->string('size', 32)->nullable();
            $table->string('weight', 32)->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('car_part_cards');
    }
}
