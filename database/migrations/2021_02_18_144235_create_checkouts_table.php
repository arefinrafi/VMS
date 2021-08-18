<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('admin_id')->unsigned()->index();
            $table->foreign('admin_id')
                    ->references('id')->on('admins')
                    ->onDelete('cascade');
            $table->biginteger('user_id')->unsigned()->index();
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->string('card_holder_name');
            $table->bigInteger('card_number');
            $table->string('showroom_name');
            $table->bigInteger('showroom_card_number');
            $table->bigInteger('amount');


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
        Schema::dropIfExists('checkouts');
    }
}
