<?php

use Illuminate\Database\Seeder;

class EtapaEntrenamientoTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_ETAPA_ENTRENAMIENTO')->delete();
        DB::table('TB_SRD_ETAPA_ENTRENAMIENTO')->insert([
            ['V_NOMBRE_ETAPA_ENTRENAMIENTO' => 'Perfeccionamiento'],
            ['V_NOMBRE_ETAPA_ENTRENAMIENTO' => 'Rendimiento'],
            ['V_NOMBRE_ETAPA_ENTRENAMIENTO' => 'Semillero'],
            ['V_NOMBRE_ETAPA_ENTRENAMIENTO' => 'Otro'],
            ]);
    }
}
