<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdTipoDeportista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_TIPO_DEPORTISTA', function (Blueprint $table) {
            $table->increments('PK_I_ID_TIPO_DEPORTISTA');            
            $table->string('V_NOMBRE_TIPO_DEPORTISTA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::drop('TB_SRD_TIPO_DEPORTISTA');
    }
}
