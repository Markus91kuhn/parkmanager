<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->text('firstname')->nullable();
            $table->text('lastname')->nullable();
            $table->text('email')->nullable();
            $table->text('phone')->nullable();
            $table->text('google')->nullable();
            // $table->text('country')->nullable(); 
            // $table->text('street')->nullable();
            // $table->text('city')->nullable();
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
        Schema::dropIfExists('partners');
    }
}
