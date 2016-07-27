<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdHistorialDeportistaEntrenador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('TB_SRD_H_DEPORTISTA_ENTRENADOR', function(Blueprint $table){
            $table->increments('PK_I_ID_HIST_DEP_ENT');
            $table->integer('FK_I_ID_DEPORTISTA_HIST')->unsigned();
            $table->integer('FK_I_ID_ENTRENADOR_HIST')->unsigned();
            $table->timestamps();
            
            $table->foreign('FK_I_ID_DEPORTISTA_HIST')->references('PK_I_ID_DEPORTISTA')->on('TB_SRD_DEPORTISTA');
            $table->foreign('FK_I_ID_ENTRENADOR_HIST')->references('PK_I_ID_ENTRENADOR')->on('TB_SRD_ENTRENADOR');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('TB_SRD_H_DEPORTISTA_ENTRENADOR', function(Blueprint $table){
            $table->dropForeign(['FK_I_ID_DEPORTISTA_HIST']);
            $table->dropForeign(['FK_I_ID_ENTRENADOR_HIST']);
        });
        Schema::drop('TB_SRD_H_DEPORTISTA_ENTRENADOR');
    }
}
