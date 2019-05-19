<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpoyeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empoyees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('FIO');
            $table->string('address');
            $table->dateTime('date_of_birth');
            $table->string('position');
            $table->decimal('amount',8,2);
            $table->bigIncrements('transfer_info_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('empoyees', function (Blueprint $table) {
            $table->foreign('transfer_info_id')->references('id')->on('transfer_infos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empoyees');
    }
}
