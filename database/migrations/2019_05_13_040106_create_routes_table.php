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
            $table->bigInteger('transfer_firm_id')->unsigned();
            $table->decimal('cost');
            $table->bigInteger('employee_info_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('routes', function (Blueprint $table){
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->foreign('transfer_firm_id')->references('id')->on('transfer_firms')->onDelete('cascade');
            $table->foreign('employee_info_id')->references('id')->on('employee_infos')->onDelete('cascade');
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
