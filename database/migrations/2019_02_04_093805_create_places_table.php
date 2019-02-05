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
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 10, 7);
            $table->decimal('south', 10, 7);
            $table->decimal('west', 10, 7);
            $table->decimal('north', 10, 7);
            $table->decimal('east', 10, 7);
            $table->string('place');
            $table->nullableMorphs('addressable');
            $table->timestamps();
        });

        Schema::create('markers', function (Blueprint $table) {
            $table->increments('id');

            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 10, 7);

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
