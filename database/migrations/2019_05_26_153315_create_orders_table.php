<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigInteger('route_id')->unsigned()->nullable();
            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->bigInteger('flight_id')->unsigned();
            $table->decimal('total_cost');
            $table->primary(array('route_id', 'client_id'))->unsigned()->nullable();

        });
        Schema::table('orders', function (Blueprint $table){
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
