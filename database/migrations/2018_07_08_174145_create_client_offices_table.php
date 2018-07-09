<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_offices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id');
            $table->string('id_dop');
            $table->string('name_dop');
            $table->string('login');
            $table->integer('pass');
            $table->string('adress');
            $table->string('tele');
            $table->string('manager');
            $table->string('manager_ID');
            $table->string('manager_mail');
            $table->string('manager_dob');
            $table->string('manager_mob');
            $table->string('contact_fase');
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
        Schema::dropIfExists('client_offices');
    }
}
