<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearRelacionesSrd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('TB_SRD_ETAPA', function(Blueprint $table){       
          
            $table->foreign('FK_I_ID_TIPO_ETAPA')
                    ->references('PK_I_ID_TIPO_ETAPA')
                    ->on('TB_SRD_TIPO_ETAPA');
        });
        
        
        Schema::table('TB_SRD_DEPORTISTA', function(Blueprint $table){       
            $table->foreign('FK_I_ID_TIPO_CUENTA')->references('PK_I_ID_TIPO_CUENTA')->on('TB_SRD_TIPO_CUENTA');            
        });
        
         Schema::table('TB_SRD_TALLA', function (Blueprint $table) {            
            $table->foreign('FK_I_ID_TIPO_TALLA')->references('PK_I_ID_TIPO_TALLA')->on('TB_SRD_TIPO_TALLA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
