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
          
            $table->foreign('FK_I_ID_TIPO_DEPORTISTA')
                    ->references('PK_I_ID_TIPO_DEPORTISTA')
                    ->on('TB_SRD_TIPO_DEPORTISTA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('TB_SRD_ETAPA', function(Blueprint $table){
//            $table->dropForeign(['FK_I_ID_TIPO_DEPORTISTA']);
//        });
        
//        Schema::table('posts', function ($table) {
//    $table->integer('user_id')->unsigned();
//
//    $table->foreign('user_id')->references('id')->on('users');
//});
    }
}
