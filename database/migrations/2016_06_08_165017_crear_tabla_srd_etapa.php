<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdEtapa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('TB_SRD_ETAPA', function (Blueprint $table) {
            $table->increments('PK_I_ID_ETAPA');
            $table->string('V_NOMBRE_ETAPA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::drop('TB_SRD_ETAPA');
    }
}
