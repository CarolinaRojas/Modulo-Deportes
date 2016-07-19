<?php

use Illuminate\Database\Seeder;

class EtapaTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_ETAPA')->delete();
        DB::table('TB_SRD_ETAPA')->insert([
            
            /************CONVENCIONAL NACIONAL************/
            ['V_NOMBRE_ETAPA' => 'RESERVA DEPORTIVA I', 'V_POR_ESTIMULO'=>'0', 'FK_I_ID_TIPO_ETAPA' => 1],
            ['V_NOMBRE_ETAPA' => 'RESERVA DEPORTIVA II', 'V_POR_ESTIMULO'=>'0', 'FK_I_ID_TIPO_ETAPA' => 1],
            ['V_NOMBRE_ETAPA' => 'ÉLITE NACIONAL I', 'V_POR_ESTIMULO'=>'0.5', 'FK_I_ID_TIPO_ETAPA' => 1],
            ['V_NOMBRE_ETAPA' => 'ÉLITE NACIONAL II', 'V_POR_ESTIMULO'=>'1.0', 'FK_I_ID_TIPO_ETAPA' => 1],
            ['V_NOMBRE_ETAPA' => 'ÉLITE NACIONAL III', 'V_POR_ESTIMULO'=>'1.25', 'FK_I_ID_TIPO_ETAPA' => 1],
            ['V_NOMBRE_ETAPA' => 'ÉLITE NACIONAL IV', 'V_POR_ESTIMULO'=>'1.5', 'FK_I_ID_TIPO_ETAPA' => 1],
            ['V_NOMBRE_ETAPA' => 'ÉLITE NACIONAL V', 'V_POR_ESTIMULO'=>'1.75', 'FK_I_ID_TIPO_ETAPA' => 1],
            ['V_NOMBRE_ETAPA' => 'ÉLITE NACIONAL VI', 'V_POR_ESTIMULO'=>'2.0', 'FK_I_ID_TIPO_ETAPA' => 1],
            ['V_NOMBRE_ETAPA' => 'ÉLITE NACIONAL VII', 'V_POR_ESTIMULO'=>'2.5', 'FK_I_ID_TIPO_ETAPA' => 1],
            ['V_NOMBRE_ETAPA' => 'ÉLITE NACIONAL VIII', 'V_POR_ESTIMULO'=>'3.0', 'FK_I_ID_TIPO_ETAPA' => 1],
            ['V_NOMBRE_ETAPA' => 'RETIRADO', 'V_POR_ESTIMULO'=>'0', 'FK_I_ID_TIPO_ETAPA' => 1],
            ['V_NOMBRE_ETAPA' => 'NO APLICA', 'V_POR_ESTIMULO'=>'0', 'FK_I_ID_TIPO_ETAPA' => 1],
            
            /************CONVENCIONAL INTERNACIONAL************/            
            ['V_NOMBRE_ETAPA' => 'ÉLITE INTERNACIONAL I', 'V_POR_ESTIMULO'=>'0.5', 'FK_I_ID_TIPO_ETAPA' => 2],
            ['V_NOMBRE_ETAPA' => 'ÉLITE INTERNACIONAL II', 'V_POR_ESTIMULO'=>'1.0', 'FK_I_ID_TIPO_ETAPA' => 2],
            ['V_NOMBRE_ETAPA' => 'ÉLITE INTERNACIONAL III', 'V_POR_ESTIMULO'=>'1.25', 'FK_I_ID_TIPO_ETAPA' => 2],
            ['V_NOMBRE_ETAPA' => 'ÉLITE INTERNACIONAL IV', 'V_POR_ESTIMULO'=>'1.5', 'FK_I_ID_TIPO_ETAPA' => 2],
            ['V_NOMBRE_ETAPA' => 'ÉLITE INTERNACIONAL V', 'V_POR_ESTIMULO'=>'1.75', 'FK_I_ID_TIPO_ETAPA' => 2],
            ['V_NOMBRE_ETAPA' => 'ÉLITE INTERNACIONAL VI', 'V_POR_ESTIMULO'=>'2.0', 'FK_I_ID_TIPO_ETAPA' => 2],
            ['V_NOMBRE_ETAPA' => 'ÉLITE INTERNACIONAL VII', 'V_POR_ESTIMULO'=>'3.0', 'FK_I_ID_TIPO_ETAPA' => 2],
            ['V_NOMBRE_ETAPA' => 'RETIRADO', 'V_POR_ESTIMULO'=>'0', 'FK_I_ID_TIPO_ETAPA' => 2],
            ['V_NOMBRE_ETAPA' => 'NO APLICA', 'V_POR_ESTIMULO'=>'0', 'FK_I_ID_TIPO_ETAPA' => 2],
            
            /*****PARALIMPICO NACIONAL*******/            
            ['V_NOMBRE_ETAPA' => 'ÉLITE PARANACIONAL I', 'V_POR_ESTIMULO'=>'1.0', 'FK_I_ID_TIPO_ETAPA' => 3],
            ['V_NOMBRE_ETAPA' => 'ÉLITE PARANACIONAL II', 'V_POR_ESTIMULO'=>'1.0', 'FK_I_ID_TIPO_ETAPA' => 3],
            ['V_NOMBRE_ETAPA' => 'ÉLITE PARANACIONAL III', 'V_POR_ESTIMULO'=>'1.5', 'FK_I_ID_TIPO_ETAPA' => 3],
            ['V_NOMBRE_ETAPA' => 'ÉLITE PARANACIONAL IV', 'V_POR_ESTIMULO'=>'2.0', 'FK_I_ID_TIPO_ETAPA' => 3],
            ['V_NOMBRE_ETAPA' => 'ÉLITE PARANACIONAL V', 'V_POR_ESTIMULO'=>'2.5', 'FK_I_ID_TIPO_ETAPA' => 3],
            ['V_NOMBRE_ETAPA' => 'ÉLITE PARANACIONAL VI', 'V_POR_ESTIMULO'=>'3.0', 'FK_I_ID_TIPO_ETAPA' => 3],
            ['V_NOMBRE_ETAPA' => 'RETIRADO', 'V_POR_ESTIMULO'=>'0', 'FK_I_ID_TIPO_ETAPA' => 3],
            ['V_NOMBRE_ETAPA' => 'NO APLICA', 'V_POR_ESTIMULO'=>'0', 'FK_I_ID_TIPO_ETAPA' => 3],
            
            /*****PARALIMPICO INTERNACIONAL*******/            
            ['V_NOMBRE_ETAPA' => 'ÉLITE INTERNACIONAL I', 'V_POR_ESTIMULO'=>'0.5', 'FK_I_ID_TIPO_ETAPA' => 4],
            ['V_NOMBRE_ETAPA' => 'ÉLITE INTERNACIONAL II', 'V_POR_ESTIMULO'=>'1.0', 'FK_I_ID_TIPO_ETAPA' => 4],
            ['V_NOMBRE_ETAPA' => 'ÉLITE INTERNACIONAL III', 'V_POR_ESTIMULO'=>'1.5', 'FK_I_ID_TIPO_ETAPA' => 4],
            ['V_NOMBRE_ETAPA' => 'ÉLITE INTERNACIONAL IV', 'V_POR_ESTIMULO'=>'2.0', 'FK_I_ID_TIPO_ETAPA' => 4],
            ['V_NOMBRE_ETAPA' => 'ÉLITE INTERNACIONAL V', 'V_POR_ESTIMULO'=>'3.0', 'FK_I_ID_TIPO_ETAPA' => 4],
            ['V_NOMBRE_ETAPA' => 'RETIRADO', 'V_POR_ESTIMULO'=>'0', 'FK_I_ID_TIPO_ETAPA' => 4],
            ['V_NOMBRE_ETAPA' => 'NO APLICA', 'V_POR_ESTIMULO'=>'0', 'FK_I_ID_TIPO_ETAPA' => 4],
    
        ]);
    }
}
