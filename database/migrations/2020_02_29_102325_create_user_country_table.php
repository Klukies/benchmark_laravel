<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCountryTable extends Migration
{
    public function up(): void
    {
        Schema::create('country_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('country_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('country_user');
    }
}
