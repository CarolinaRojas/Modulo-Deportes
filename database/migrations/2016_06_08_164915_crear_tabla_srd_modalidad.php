<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdModalidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_MODALIDAD', function (Blueprint $table) {
            $table->increments('PK_I_ID_MODALIDAD');               
            $table->integer('FK_I_ID_DEPORTE')->unsigned();            
            $table->string('V_NOMBRE_MODALIDAD');
            
            $table->foreign('FK_I_ID_DEPORTE')->references('PK_I_ID_DEPORTE')->on('TB_SRD_DEPORTE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::table('TB_SRD_MODALIDAD', function(Blueprint $table){
            $table->dropForeign(['FK_I_ID_DEPORTE']);
        });
        Schema::drop('TB_SRD_MODALIDAD');
    }
}
