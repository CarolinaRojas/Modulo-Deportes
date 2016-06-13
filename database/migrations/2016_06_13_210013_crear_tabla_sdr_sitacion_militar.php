<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSdrSitacionMilitar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('TB_SRD_SITUACION_MILITAR', function (Blueprint $table) {
            $table->increments('PK_I_ID_SITUACION_MILITAR');
            $table->string('V_NOMBRE_SITUACION_MILITAR');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TB_SRD_SITUACION_MILITAR');
    }
}
