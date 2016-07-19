<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdEtapaEntrenamiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_ETAPA_ENTRENAMIENTO', function (Blueprint $table) {
            $table->increments('PK_I_ID_ETAPA_ENTRENAMIENTO');
            $table->string('V_NOMBRE_ETAPA_ENTRENAMIENTO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TB_SRD_ETAPA_ENTREMIENTO');
    }
}
