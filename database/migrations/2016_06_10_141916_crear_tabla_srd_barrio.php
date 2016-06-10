<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdBarrio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_BARRIO', function (Blueprint $table) {
            $table->increments('PK_I_ID_BARRIO');
            $table->string('V_NOMBRE_BARRIO');
            $table->integer('V_COD_UPZ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TB_SRD_BARRIO');
    }
}
