<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdHistorialEtapa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_HISTORIAL_ETAPA', function(Blueprint $table){
            $table->increments('PK_I_ID_HISTORIAL_ETAPA');
            $table->integer('FK_I_ID_DEPORTISTA_H')->unsigned();
            $table->integer('FK_I_ID_ETAPA')->unsigned();
            $table->integer('I_SMMLV');
            $table->timestamps();
            
            $table->foreign('FK_I_ID_DEPORTISTA_H')->references('PK_I_ID_DEPORTISTA')->on('TB_SRD_DEPORTISTA');
            $table->foreign('FK_I_ID_ETAPA')->references('PK_I_ID_ETAPA')->on('TB_SRD_ETAPA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('TB_SRD_HISTORIAL_ETAPA', function(Blueprint $table){
            $table->dropForeign(['FK_I_ID_DEPORTISTA_H']);
            $table->dropForeign(['FK_I_ID_ETAPA']);
        });
        Schema::drop('TB_SRD_HISTORIAL_ETAPA');
    }
}
