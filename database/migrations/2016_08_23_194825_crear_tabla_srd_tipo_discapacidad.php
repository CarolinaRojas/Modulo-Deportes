<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdTipoDiscapacidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_TIPO_DISCAPACIDAD', function (Blueprint $table) {
            $table->increments('PK_I_ID_TIPO_DISCAPACIDAD');               
            $table->string('V_NOMBRE_DISCAPACIDAD');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TB_SRD_TIPO_DISCAPACIDAD');
    }
}
