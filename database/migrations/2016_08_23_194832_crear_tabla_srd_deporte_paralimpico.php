<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdDeporteParalimpico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_DEPORTE_PARALIMPICO', function (Blueprint $table) {
            $table->increments('PK_I_ID_DEPORTE_PARALIMPICO');
            $table->integer('FK_I_ID_DIVISION')->unsigned();
            $table->integer('FK_I_ID_TIPO_DISCAPACIDAD')->unsigned();            
            $table->string('V_FUNCIONALIDAD');
            
            $table->foreign('FK_I_ID_DIVISION')->references('PK_I_ID_DIVISION')->on('TB_SRD_DIVISION');
            $table->foreign('FK_I_ID_TIPO_DISCAPACIDAD')->references('PK_I_ID_TIPO_DISCAPACIDAD')->on('TB_SRD_TIPO_DISCAPACIDAD');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::table('TB_SRD_DEPORTE_PARALIMPICO', function(Blueprint $table){
            $table->dropForeign(['FK_I_ID_TIPO_DIVISION']);
            $table->dropForeign(['FK_I_ID_TIPO_DISCAPACIDAD']);
        });
        Schema::drop('TB_SRD_DEPORTE_PARALIMPICO');
    }
}
