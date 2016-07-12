<?php

use Illuminate\Database\Seeder;

class TipoEtapaTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_TIPO_ETAPA')->delete();        
        DB::table('TB_SRD_TIPO_ETAPA')->insert([
            ['V_NOMBRE_TIPO_ETAPA' => 'Nacional', 'FK_I_ID_TIPO_DEPORTISTA' => 1],//Convencional
            ['V_NOMBRE_TIPO_ETAPA' => 'Internacional', 'FK_I_ID_TIPO_DEPORTISTA' => 1],//Convencional
            ['V_NOMBRE_TIPO_ETAPA' => 'Nacional', 'FK_I_ID_TIPO_DEPORTISTA' => 2],//Paralimpico
            ['V_NOMBRE_TIPO_ETAPA' => 'Internacional', 'FK_I_ID_TIPO_DEPORTISTA' => 2],//Paralimipico
        ]);
    }
}
