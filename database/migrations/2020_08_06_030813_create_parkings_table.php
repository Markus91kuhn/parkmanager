<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->increments('id');
            // $table->increments('number');
            // $table->text('country')->nullable();
           
            // $table->text('street')->nullable();
            // $table->text('city')->nullable();
            $table->text('firstname')->nullable();
            $table->text('lastname')->nullable();
            $table->text('google')->nullable();
            $table->text('email')->nullable();
            $table->text('phone')->nullable();
            $table->text('zip_code')->nullable();
            $table->text('valid_license')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('parkings');
    }
}
