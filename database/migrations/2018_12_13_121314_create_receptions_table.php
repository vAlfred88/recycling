<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->unsignedInteger('company_id')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('cascade');
        });

        Schema::create('reception_service', function (Blueprint $table) {
            $table->unsignedInteger('reception_id')->nullable();
            $table->unsignedInteger('service_id')->nullable();

            $table->foreign('reception_id')->references('id')->on('receptions')
                ->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')
                ->onDelete('cascade');
        });

        Schema::create('reception_user', function (Blueprint $table) {
            $table->unsignedInteger('reception_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();

            $table->foreign('reception_id')->references('id')->on('receptions')
                ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('receptions');
        Schema::dropIfExists('reception_service');
        Schema::dropIfExists('reception_user');
    }
}
