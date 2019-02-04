<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 32);
            $table->string('last_name', 32);
            $table->string('personal_code', 12)->nullable();
            $table->string('position', 32)->nullable();
            $table->string('street', 50)->nullable();
            $table->string('city', 32)->nullable();
            $table->string('village', 32)->nullable();
            $table->string('country', 32)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->string('mobile_phone_number', 32)->nullable();
            $table->string('phone_number', 32)->nullable();
            $table->string('fax', 32)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('bank_id')->unsigned()->nullable();
            $table->foreign('bank_id', 'user_bank')->references('id')->on('banks');
            $table->string('bank_account_number', 50)->nullable();
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id', 'user_role')->references('id')->on('user_roles');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id', 'user_status')->references('id')->on('user_statuses');
            $table->text('photo')->nullable();
            $table->string('remember_token')->nullable();
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
        Schema::dropIfExists('users');
    }
}
