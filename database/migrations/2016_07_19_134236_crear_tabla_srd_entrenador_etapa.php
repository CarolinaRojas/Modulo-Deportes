<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdEntrenadorEtapa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_ENTRENADOR_ETAPA', function (Blueprint $table) {
            $table->increments('PK_I_ID_ENTRENADOR_ETAPA');
            $table->integer('FK_I_ID_ENTRENADOR_E')->unsigned();
            $table->integer('FK_I_ID_ETAPA_ENTRENAMIENTO')->unsigned();            
            $table->timestamps();
            
            $table->foreign('FK_I_ID_ENTRENADOR_E')->references('PK_I_ID_ENTRENADOR')->on('TB_SRD_ENTRENADOR');
            $table->foreign('FK_I_ID_ETAPA_ENTRENAMIENTO')->references('PK_I_ID_ETAPA_ENTRENAMIENTO')->on('TB_SRD_ETAPA_ENTRENAMIENTO');
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
            $table->dropForeign(['FK_I_ID_ENTRENADOR_E']);
            $table->dropForeign(['FK_I_ID_ETAPA_ENTRENAMIENTO']);
            
        });
        Schema::drop('TB_SRD_ENTRENADOR_ETAPA');
    }
}
