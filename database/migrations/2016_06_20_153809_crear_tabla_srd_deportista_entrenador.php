<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdDeportistaEntrenador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_DEPORTISTA_ENTRENADOR', function (Blueprint $table) {
            $table->increments('PK_I_ID_DEPORTISTA_ENTRENADOR');
            $table->integer('FK_I_ID_DEPORTISTA')->unsigned();
            $table->integer('FK_I_ID_ENTRENADOR')->unsigned();
            
            $table->timestamps();
            
            $table->foreign('FK_I_ID_DEPORTISTA')->references('PK_I_ID_DEPORTISTA')->on('TB_SRD_DEPORTISTA');
            $table->foreign('FK_I_ID_ENTRENADOR')->references('PK_I_ID_ENTRENADOR')->on('TB_SRD_ENTRENADOR');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('TB_SRD_DEPORTISTA_ENTRENADOR', function(Blueprint $table){
            $table->dropForeign(['FK_I_ID_DEPORTISTA']);
            $table->dropForeign(['FK_I_ID_ENTRENADOR']);
        });
        Schema::drop('TB_SRD_DEPORTISTA_ENTRENADOR');
    }
}
