<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdClubDeportivo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_CLUB_DEPORTIVO', function (Blueprint $table) {
            $table->increments('PK_I_ID_CLUB_DEPORTIVO');
            $table->string('V_NOMBRE_CLUB_DEPORTIVO');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TB_SRD_CLUB_DEPORTIVO');
    }
}
