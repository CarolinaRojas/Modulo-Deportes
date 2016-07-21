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
            $table->integer('FK_I_ID_AGRUPACION')->unsigned();
            $table->integer('FK_I_ID_DEPORTE')->unsigned();
            $table->string('V_TELEFONO_FIJO');
            $table->string('V_TELEFONO_CELULAR');
            $table->string('V_CORREO_ELECTRONICO');
            $table->string('V_URL_IMG');
            
            $table->timestamps();
            
            $table->foreign('FK_I_ID_AGRUPACION')->references('PK_I_ID_AGRUPACION')->on('TB_SRD_AGRUPACION');
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
        Schema::drop('TB_SRD_ENTRENADOR');
    }
}
