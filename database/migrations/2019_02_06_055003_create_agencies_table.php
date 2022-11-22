<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trade_name');
            $table->unsignedInteger('record_number')->nullable();;
            $table->string('delegate_record')->nullable();;
            $table->unsignedInteger('agency_number')->nullable();;
            $table->string('agent_name');
            $table->unsignedInteger('agent_card_number')->nullable();;
            $table->string('email');
            $table->string('mobile')->nullable();

            $table->unsignedInteger('user_id')->nullable();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->unsignedInteger('project_id');

            // $table->foreign('project_id')

            //     ->references('id')->on('projects')
            //     ->onDelete('cascade');  

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
        Schema::dropIfExists('agencies');
    }
}
