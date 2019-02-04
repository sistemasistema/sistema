<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name', 32)->unique();
            $table->string('registration_number', 32)->nullable();
            $table->string('vat_code', 32)->nullable();
            $table->string('street_l_a', 50)->nullable();
            $table->string('city_l_a', 32)->nullable();
            $table->string('village_l_a', 32)->nullable();
            $table->string('country_l_a', 32)->nullable();
            $table->string('postcode_l_a', 10)->nullable();
            $table->string('street_a_a', 50)->nullable();
            $table->string('city_a_a', 32)->nullable();
            $table->string('village_a_a', 32)->nullable();
            $table->string('country_a_a', 32)->nullable();
            $table->string('postcode_a_a', 10)->nullable();
            $table->string('homepage', 255)->nullable();
            $table->string('head_name', 32)->nullable();
            $table->string('head_surname', 32)->nullable();
            $table->string('mobile_phone_number', 32)->nullable();
            $table->string('phone_number', 32)->nullable();
            $table->string('fax', 32)->nullable();
            $table->string('email');
            $table->integer('bank_id')->unsigned()->nullable();
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->string('bank_account_number', 50)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
