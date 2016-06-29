<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdTipoEstimulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('TB_SRD_TIPO_ESTIMULO', function(Blueprint $table){
            $table->increments('PK_I_ID_TIPO_ESTIMULO');
            $table->string('V_NOMBRE_ESTIMULO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TB_SRD_TIPO_ESTIMULO');
    }
}
