<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairWorksZsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repair_works_zs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('n');
            $table->string('t');
            $table->string('z');
            $table->string('u');
            $table->string('p');
            $table->string('i');
            $table->string('new');
            $table->string('v');
            $table->string('c');
            $table->string('r');
            $table->string('m');
            $table->string('zm');
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
        Schema::dropIfExists('repair_works_zs');
    }
}
