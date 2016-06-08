<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdEstadoCivil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('TB_SRD_ESTADO_CIVIL', function (Blueprint $table) {
            $table->increments('PK_I_ID_ESTADO_CIVIL');            
            $table->string('V_NOMBRE_ESTADO_CIVIL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TB_SRD_ESTADO_CIVIL');
    }
}
