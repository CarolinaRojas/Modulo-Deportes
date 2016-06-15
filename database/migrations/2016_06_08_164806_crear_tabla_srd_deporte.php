<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdDeporte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('TB_SRD_DEPORTE', function (Blueprint $table) {
            $table->increments('PK_I_ID_DEPORTE');               
            $table->integer('FK_I_ID_AGRUPACION')->unsigned();            
            $table->string('V_NOMBRE_DEPORTE');
            
            $table->foreign('FK_I_ID_AGRUPACION')->references('PK_I_ID_AGRUPACION')->on('TB_SRD_AGRUPACION');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::table('TB_SRD_DEPORTE', function(Blueprint $table){
            $table->dropForeign(['FK_I_ID_AGRUPACION']);
        });
        Schema::drop('TB_SRD_DEPORTE');
    }
}
