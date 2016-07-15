<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdTalla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_TALLA', function (Blueprint $table) {
            $table->increments('PK_I_ID_TALLA');
            $table->integer('FK_I_ID_GENERO');
            $table->integer('FK_I_ID_TIPO_TALLA')->unsigned();            
            $table->string('V_EU');
            $table->string('V_UK');
            $table->string('V_USA'); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TB_SRD_TALLA');
    }
}
