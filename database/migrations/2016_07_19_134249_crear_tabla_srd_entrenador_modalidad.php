<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdEntrenadorModalidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_ENTRENADOR_MODALIDAD', function (Blueprint $table) {
            $table->increments('PK_I_ID_ENTRENADOR_MODALIDAD');
            $table->integer('FK_I_ID_ENTRENADOR_M')->unsigned();
            $table->integer('FK_I_ID_MODALIDAD_E')->unsigned();            
            $table->timestamps();
            
            $table->foreign('FK_I_ID_ENTRENADOR_M')->references('PK_I_ID_ENTRENADOR')->on('TB_SRD_ENTRENADOR');
            $table->foreign('FK_I_ID_MODALIDAD_E')->references('PK_I_ID_MODALIDAD')->on('TB_SRD_MODALIDAD');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('TB_SRD_ENTRENADOR_ETAPA', function(Blueprint $table){
            $table->dropForeign(['FK_I_ID_ENTRENADOR_M']);
            $table->dropForeign(['FK_I_ID_MODALIDAD_E']);
            
        });
        Schema::drop('TB_SRD_ENTRENADOR_ETAPA');
    }
}
