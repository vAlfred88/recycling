<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('lat', 10,6);
            $table->decimal('lng', 10,6);
            $table->string('place_id');
            $table->string('address');
            $table->string('city')->nullable();
            $table->json('coords')->nullable();
            $table->nullableMorphs('addressable');
            $table->timestamps();
        });

        Schema::create('markers', function (Blueprint $table) {
            $table->increments('id');
            $table->point('position');
            $table->unsignedInteger('place_id');
            $table->foreign('place_id')
                  ->references('id')
                  ->on('places')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
