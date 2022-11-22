<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();

            $table->unsignedInteger('customer_id')->nullable();
            $table->foreign('customer_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->unsignedInteger('location_id')->nullable();;
            $table->foreign('location_id')
                ->references('id')->on('locations')
                    ->onDelete('cascade');

            $table->unsignedInteger('agency_id')->nullable();;
            $table->foreign('agency_id')
                ->references('id')->on('agencies')
                    ->onDelete('cascade');

            $table->enum('project_type', ['normal', 'not_normal'])->default('normal');
            // $table->decimal('total_rate', 8, 2)->default(0);
            // $table->decimal('price_per_hours', 8, 2)->default(0);
            // $table->decimal('estimated_hours', 8, 2)->default(0);
            // $table->decimal('estimated_cost', 8, 2)->default(0);

            $table->decimal('total_rate', 8, 2)->nullable();
            $table->decimal('price_per_hours', 8, 2)->nullable();
            $table->decimal('estimated_hours', 8, 2)->nullable();
            $table->decimal('estimated_cost', 8, 2)->nullable();
            $table->enum('status', ['not_started', 'in_progress', 'on_hold', 'cancelled', 'completed'])->nullable();
            
            $table->unsignedInteger('authorization_request_number')->nullable();;            
            $table->unsignedInteger('license_number')->nullable();;
            $table->unsignedInteger('plot_number')->nullable();;
            $table->unsignedInteger('cadastral_decision_number')->nullable();;

            $table->integer('lead_id')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->text('description')->nullable();
            $table->integer('created_by')->index();
            $table->boolean('favorite')->default(0);


            $table->enum('buiding_type', ['institutional', 'business', 'storage', 'assembly', 'residential'])->nullable();;
            $table->unsignedInteger('role_number')->nullable();
            $table->unsignedInteger('unit_number')->nullable();
            $table->enum('using', ['support ', 'personal'])->nullable();
            $table->decimal('build_rate', 8, 2)->default(0);
           

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
        Schema::dropIfExists('projects');
    }
}
