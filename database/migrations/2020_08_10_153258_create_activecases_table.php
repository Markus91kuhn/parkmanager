<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivecasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activecases', function (Blueprint $table) {
            $table->increments('id');
            // $table->text('country')->nullable();
            // $table->text('city')->nullable();
            // $table->text('street')->nullable();
            $table->text('google')->nullable();
            $table->text('zip_code')->nullable();
            $table->text('city_name')->nullable();
            $table->text('car_number')->nullable();
            $table->text('car_color')->nullable();
            $table->text('car_brand')->nullable();
            $table->text('lat')->nullable();
            $table->text('lng')->nullable();
            $table->text('activetimeout')->nullable();
            $table->text('partner_name')->nullable();
            $table->text('user_name')->nullable();
            $table->text('carpark')->nullable();
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
        Schema::dropIfExists('activecases');
    }
}
