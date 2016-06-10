<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSrdDeportista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TB_SRD_DEPORTISTA', function (Blueprint $table) {
            $table->increments('PK_I_ID_DEPORTISTA');
            
            $table->integer('FK_I_ID_PERSONA')->unsigned();
            $table->integer('FK_I_ID_ESTADO_CIVIL')->unsigned();
            $table->integer('FK_I_ID_ESTRATO')->unsigned();
            $table->integer('FK_I_ID_GRUPO_SANGUINEO')->unsigned();
            $table->integer('FK_I_ID_AGRUPACION')->unsigned();
            $table->integer('FK_I_ID_DEPORTE')->unsigned();
            $table->integer('FK_I_ID_MODALIDAD')->unsigned();
            $table->integer('FK_I_ID_ETAPA')->unsigned();
            $table->integer('FK_I_ID_TIPO_DEPORTISTA')->unsigned();
            $table->integer('FK_I_ID_BANCO')->unsigned();
            $table->integer('FK_I_ID_DEPARTAMENTO')->unsigned();
            $table->integer('FK_I_ID_EPS')->unsigned();
            $table->integer('FK_I_ID_LOCALIDAD')->unsigned();
            $table->integer('FK_I_ID_BARRIO')->unsigned();
            
            $table->string('V_DIRECCION_RESIDENCIA');
            $table->string('V_TELEFONO_FIJO');
            $table->string('V_TELEFONO_CELULAR');
            $table->string('V_CORREO_ELECTRONICO');
            $table->boolean('B_SITUACION_MILITAR');
            $table->string('V_CANTIDAD_HIJOS');
            $table->string('V_NUMERO_CUENTA');
            
            $table->timestamps();
            
            $table->foreign('FK_I_ID_ESTADO_CIVIL')->references('PK_I_ID_ESTADO_CIVIL')->on('TB_SRD_ESTADO_CIVIL');
            $table->foreign('FK_I_ID_ESTRATO')->references('PK_I_ID_ESTRATO')->on('TB_SRD_ESTRATO');
            $table->foreign('FK_I_ID_AGRUPACION')->references('PK_I_ID_AGRUPACION')->on('TB_SRD_AGRUPACION');
            $table->foreign('FK_I_ID_MODALIDAD')->references('PK_I_ID_MODALIDAD')->on('TB_SRD_MODALIDAD');
            $table->foreign('FK_I_ID_ETAPA')->references('PK_I_ID_ETAPA')->on('TB_SRD_ETAPA');
            $table->foreign('FK_I_ID_TIPO_DEPORTISTA')->references('PK_I_ID_TIPO_DEPORTISTA')->on('TB_SRD_TIPO_DEPORTISTA');
            $table->foreign('FK_I_ID_BANCO')->references('PK_I_ID_BANCO')->on('TB_SRD_BANCO');
            $table->foreign('FK_I_ID_BARRIO')->references('PK_I_ID_BARRIO')->on('TB_SRD_BARRIO');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('TB_SRD_DEPORTISTA', function(Blueprint $table){
            $table->dropForeign(['FK_I_ID_ESTADO_CIVIL']);
            $table->dropForeign(['FK_I_ID_ESTRATO']);
            $table->dropForeign(['FK_I_ID_AGRUPACION']);
            $table->dropForeign(['FK_I_ID_MODALIDAD']);
            $table->dropForeign(['FK_I_ID_ETAPA']);
            $table->dropForeign(['FK_I_ID_TIPO_DEPORTISTA']);
            $table->dropForeign(['FK_I_ID_BANCO']);
            $table->dropForeign(['FK_I_ID_BARRIO']);
        });
        Schema::drop('TB_SRD_DEPORTISTA');
    }
}
