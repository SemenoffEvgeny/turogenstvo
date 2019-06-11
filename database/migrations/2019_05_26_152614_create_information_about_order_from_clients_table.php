<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationAboutOrderFromClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_about_order_from_clients', function (Blueprint $table) {
            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->smallInteger('number_of_person');
            $table->timestamps();
        });
        Schema::table('information_about_order_from_clients', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information_about_order_from_clients');
    }
}
