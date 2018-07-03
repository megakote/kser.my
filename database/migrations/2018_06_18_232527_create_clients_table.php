<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_1c'); //  НОМЕР КЛИЕНТА (В БАЗЕ 1С)
//            $table->integer('user_id')->nullable();
            $table->string('name');
            $table->string('address');
            $table->string('tel');
            $table->string('manager');
            $table->integer('manager_id');
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
        Schema::dropIfExists('clients');
    }
}
