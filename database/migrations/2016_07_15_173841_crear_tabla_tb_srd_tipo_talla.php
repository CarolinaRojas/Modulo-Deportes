<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTbSrdTipoTalla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('TB_SRD_TIPO_TALLA', function (Blueprint $table) {
            $table->increments('PK_I_ID_TIPO_TALLA');            
            $table->string('V_NOMBRE_TIPO_TALLA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TB_SRD_TIPO_TALLA');
    }
}
