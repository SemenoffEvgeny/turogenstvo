<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('country',50);
            $table->char('city',50);
            $table->smallInteger('duration');
            $table->bigInteger('hotel_id')->unsigned();
            $table->bigInteger('transfer_info_id')->unsigned();
            $table->decimal('cost');
            $table->bigInteger('employee_id')->unsigned();
        });

        Schema::table('routes', function (Blueprint $table){
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->foreign('transfer_info_id')->references('id')->on('transfer_infos')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
