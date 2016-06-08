<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdAgrupacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_AGRUPACION', function (Blueprint $table) {
            $table->increments('PK_I_ID_AGRUPACION');
            $table->string('V_NOMBRE_AGRUPACION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::drop('TB_SRD_AGRUPACION');
    }
}
