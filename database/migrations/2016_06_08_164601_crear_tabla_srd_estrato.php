<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdEstrato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('TB_SRD_ESTRATO', function (Blueprint $table) {
            $table->increments('PK_I_ID_ESTRATO');
            $table->string('V_NOMBRE_ESTRATO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TB_SRD_ESTRATO');
    }
}
