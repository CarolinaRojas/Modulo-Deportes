<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdBanco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_BANCO', function (Blueprint $table) {
            $table->increments('PK_I_ID_BANCO');
            $table->string('V_NOMBRE_BANCO');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::drop('TB_SRD_BANCO');
    }
}
