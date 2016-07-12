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
            $table->integer('FK_I_ID_SITUACION_MILITAR')->unsigned();
            $table->integer('FK_I_ID_ESTRATO')->unsigned();
            $table->integer('FK_I_ID_EPS')->unsigned();
            $table->integer('FK_I_ID_GRUPO_SANGUINEO')->unsigned();                        
            $table->integer('FK_I_ID_BANCO')->unsigned();
            $table->integer('FK_I_ID_TIPO_CUENTA')->unsigned();
            //$table->integer('FK_I_ID_TIPO_DEPORTISTA')->unsigned();
            $table->integer('FK_I_ID_AGRUPACION')->unsigned();
            $table->integer('FK_I_ID_DEPORTE')->unsigned();
            $table->integer('FK_I_ID_MODALIDAD')->unsigned();
       //     $table->integer('FK_I_ID_ETAPA')->unsigned();
            $table->integer('FK_I_ID_CLUB_DEPORTIVO')->unsigned()->nullable();
            $table->integer('FK_I_ID_TALLA_CAMISA')->unsigned()->nullable();
            $table->integer('FK_I_ID_TALLA_ZAPATOS')->unsigned()->nullable();
            $table->integer('FK_I_ID_TALLA_PANTALON')->unsigned()->nullable();
            $table->integer('FK_I_ID_TALLA_CHAQUETA')->unsigned()->nullable();            
            
            $table->string('V_LOCALIDAD');
            $table->string('V_BARRIO');
            $table->string('V_DIRECCION_RESIDENCIA');
            $table->string('V_TELEFONO_FIJO');
            $table->string('V_TELEFONO_CELULAR');
            $table->string('V_CORREO_ELECTRONICO');
            $table->string('V_CANTIDAD_HIJOS');
            $table->string('V_NUMERO_CUENTA');
            $table->string('V_URL_IMG');
            $table->date('D_FECHA_INGRESO');
            $table->date('D_FECHA_RETIRO')->nullable();
            
            $table->timestamps();
            
            $table->foreign('FK_I_ID_ESTADO_CIVIL')->references('PK_I_ID_ESTADO_CIVIL')->on('TB_SRD_ESTADO_CIVIL');
            $table->foreign('FK_I_ID_ESTRATO')->references('PK_I_ID_ESTRATO')->on('TB_SRD_ESTRATO');
            $table->foreign('FK_I_ID_AGRUPACION')->references('PK_I_ID_AGRUPACION')->on('TB_SRD_AGRUPACION');
            $table->foreign('FK_I_ID_MODALIDAD')->references('PK_I_ID_MODALIDAD')->on('TB_SRD_MODALIDAD');
            //$table->foreign('FK_I_ID_ETAPA')->references('PK_I_ID_ETAPA')->on('TB_SRD_ETAPA');
            //$table->foreign('FK_I_ID_TIPO_DEPORTISTA')->references('PK_I_ID_TIPO_DEPORTISTA')->on('TB_SRD_TIPO_DEPORTISTA');
            $table->foreign('FK_I_ID_BANCO')->references('PK_I_ID_BANCO')->on('TB_SRD_BANCO');     
            $table->foreign('FK_I_ID_SITUACION_MILITAR')->references('PK_I_ID_SITUACION_MILITAR')->on('TB_SRD_SITUACION_MILITAR');
            $table->foreign('FK_I_ID_CLUB_DEPORTIVO')->references('PK_I_ID_CLUB_DEPORTIVO')->on('TB_SRD_CLUB_DEPORTIVO');
            
            $table->foreign('FK_I_ID_TALLA_CAMISA')->references('PK_I_ID_TALLA')->on('TB_SRD_TALLA');
            $table->foreign('FK_I_ID_TALLA_ZAPATOS')->references('PK_I_ID_TALLA')->on('TB_SRD_TALLA');
            $table->foreign('FK_I_ID_TALLA_PANTALON')->references('PK_I_ID_TALLA')->on('TB_SRD_TALLA');
            $table->foreign('FK_I_ID_TALLA_CHAQUETA')->references('PK_I_ID_TALLA')->on('TB_SRD_TALLA');
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
         //   $table->dropForeign(['FK_I_ID_ETAPA']);
            $table->dropForeign(['FK_I_ID_TIPO_DEPORTISTA']);
            $table->dropForeign(['FK_I_ID_BANCO']);
            $table->dropForeign(['FK_I_ID_SITUACION_MILITAR']);
            $table->dropForeign(['FK_I_ID_CLUB_DEPORTIVO']);
            
            $table->dropForeign(['FK_I_ID_TALLA_CAMISA']);
            $table->dropForeign(['FK_I_ID_TALLA_ZAPATOS']);
            $table->dropForeign(['FK_I_ID_TALLA_PANTALON']);
            $table->dropForeign(['FK_I_ID_TALLA_CHAQUETA']);
            
        });
        Schema::drop('TB_SRD_DEPORTISTA');
    }
}
