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
        Schema::create('design_request_office', function (Blueprint $table) {
            $table->unsignedBigInteger('office_id');
            $table->unsignedBigInteger('design_request_id');

            $table->foreign('office_id')->references('id')->on('users');
            $table->foreign('design_request_id')->references('id')->on('design_request');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('design_request_office');
    }
};
