<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdTipoEtapa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('TB_SRD_TIPO_ETAPA', function (Blueprint $table) {
       $table->increments('PK_I_ID_TIPO_ETAPA');            
       $table->integer('FK_I_ID_TIPO_DEPORTISTA')->unsigned();
       $table->string('V_NOMBRE_TIPO_ETAPA');
       
       $table->foreign('FK_I_ID_TIPO_DEPORTISTA')->references('PK_I_ID_TIPO_DEPORTISTA')->on('TB_SRD_TIPO_DEPORTISTA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('TB_SRD_TIPO_ETAPA', function(Blueprint $table){
            $table->dropForeign(['FK_I_ID_TIPO_DEPORTISTA']);
        });        
        Schema::drop('TB_SRD_TIPO_ETAPA');
    }
}
