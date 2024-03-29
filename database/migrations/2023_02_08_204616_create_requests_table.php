<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ambulance');
            $table->foreign('id_ambulance')->references('id')->on('ambulances');
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')->references('id')->on('status');
            $table->string('type');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->jsonb('details');
            $table->string('address');
            $table->dateTime('started')->nullable();
            $table->dateTime('ended')->nullable();
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
        Schema::dropIfExists('requests');
    }
};
