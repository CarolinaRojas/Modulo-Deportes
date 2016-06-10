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
            $table->string('V_NOMBRE_DEPORTE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::drop('TB_SRD_DEPORTE');
    }
}
