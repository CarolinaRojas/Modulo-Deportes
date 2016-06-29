<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdDeportistaEstimulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_DEPORTISTA_ESTIMULO', function(Blueprint $table){
            $table->increments('PK_I_ID_DEPORTISTA_ESTIMULO');
            $table->integer('FK_I_ID_DEPORTISTA_E')->unsigned();
            $table->integer('FK_I_ID_TIPO_ESTIMULO')->unsigned();
            $table->string('V_VALOR_ESTIMULO');
            $table->integer('I_SMMLV');
            $table->timestamps();
            
            $table->foreign('FK_I_ID_DEPORTISTA_E')->references('PK_I_ID_DEPORTISTA')->on('TB_SRD_DEPORTISTA');
            $table->foreign('FK_I_ID_TIPO_ESTIMULO')->references('PK_I_ID_TIPO_ESTIMULO')->on('TB_SRD_TIPO_ESTIMULO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('TB_SRD_DEPORTISTA_ESTIMULO', function(Blueprint $table){
            $table->dropForeign(['FK_I_ID_DEPORTISTA_E']);
            $table->dropForeign(['FK_I_ID_TIPO_ESTIMULO']);
        });
        Schema::drop('TB_SRD_DEPORTISTA_ESTIMULO');
    }
}
