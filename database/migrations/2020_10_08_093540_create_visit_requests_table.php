<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_requests', function (Blueprint $table) {
            $table->increments('id');
           // $table->string('title');

            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('office_id');
            $table->foreign('office_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            // $table->unsignedInteger('request_type_id');
            // $table->foreign('request_type_id')->references('id')->on('request_types')->onDelete('cascade');
            $table->text('description');

           /// $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->nullable();

            $table->enum('request_type', [ 'visit_request' ,'design_request', 'support_service_request', 'contractor_request' ,'supervision_request'])->nullable();

            $table->string('note')->nullable();

            $table->enum('status', [ 'new' ,'pending', 'sent', 'accepted'])->nullable();

            //$table->enum('enginnerType', [ 'informatic' ,'archatic', 'sent', 'accepted'])->nullable();
            
            $table->Boolean('sent')->default(0);

            $table->json('enginnering_type')->nullable();
        

            $table->dateTime('dead_line_date')->nullable();

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
        Schema::dropIfExists('visit_requests');
    }
}



