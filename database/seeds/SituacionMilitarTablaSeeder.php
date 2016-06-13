<?php

use Illuminate\Database\Seeder;

class SituacionMilitarTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_SITUACION_MILITAR')->delete();        
        DB::table('TB_SRD_SITUACION_MILITAR')->insert([
            ['V_NOMBRE_SITUACION_MILITAR' => 'No definida'],
            ['V_NOMBRE_SITUACION_MILITAR' => 'Definida'],
            ['V_NOMBRE_SITUACION_MILITAR' => 'No aplica'],
        ]);
    }
}
