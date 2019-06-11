<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('firm_name', 50);
            $table->bigInteger('flight_id')->unsigned()->nullable();
        });
        Schema::table('transfer_infos', function (Blueprint $table) {
            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_infos');
    }
}
