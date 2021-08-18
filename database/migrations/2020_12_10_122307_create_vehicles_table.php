<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->biginteger('admin_id')->unsigned()->index();
            $table->foreign('admin_id')
                    ->references('id')->on('admins')
                    ->onDelete('cascade');
            // $table->integer('admin_id');
            // $table->string('vehicle_name');
            // $table->string('vehicle_code');
            // $table->string('vehicle_model');
            // $table->text('description');
            // $table->string('sname');
            // $table->string('address');
            // $table->integer('contact');
            // $table->bigInteger('price');
            // $table->string('image');

            $table->string('brand');
            $table->string('model');
            $table->string('year');
            $table->string('mileage');
            $table->string('engine_capacity');
            $table->string('fuel_type');
            $table->string('max_power');
            $table->string('max_speed');
            $table->string('torque');
            $table->string('fuel_consumption');
            $table->string('door');
            $table->string('drive_type');
            $table->string('seats');
            $table->string('wheel_base');
            $table->string('weight');
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->string('fuel_tank_capacity');
            $table->string('color');
            $table->string('no_of_cylinder');
            $table->text('description');
            $table->bigInteger('price');
            $table->string('showroom_name');
            $table->string('address');
            $table->integer('contact');
            $table->string('image');
            $table->bigInteger('purchase');
            $table->bigInteger('selling')->default('0');
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
        Schema::dropIfExists('vehicles');
    }
}
