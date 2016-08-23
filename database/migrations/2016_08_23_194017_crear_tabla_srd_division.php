<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdDivision extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('TB_SRD_DIVISION', function (Blueprint $table) {
            $table->increments('PK_I_ID_DIVISION');               
            $table->integer('FK_I_ID_MODALIDAD')->unsigned();
            $table->string('V_NOMBRE_DIVISION');
            
            $table->foreign('FK_I_ID_MODALIDAD')->references('PK_I_ID_MODALIDAD')->on('TB_SRD_MODALIDAD');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::table('TB_SRD_DIVISION', function(Blueprint $table){
            $table->dropForeign(['FK_I_ID_MODALIDAD']);
        });
        Schema::drop('TB_SRD_DIVISION');
    }
}
