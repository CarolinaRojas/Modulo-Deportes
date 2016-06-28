<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdEntrenador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('TB_SRD_ENTRENADOR', function (Blueprint $table) {
            $table->increments('PK_I_ID_ENTRENADOR');
            $table->integer('FK_I_ID_PERSONA');
            $table->string('V_TELEFONO');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TB_SRD_ENTRENADOR');
    }
}