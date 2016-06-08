<?php

use Illuminate\Database\Seeder;

class EstadoCivilTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_ESTADO_CIVIL')->delete();        
        DB::table('TB_SRD_ESTADO_CIVIL')->insert([
            ['V_NOMBRE_ESTADO_CIVIL' => 'Casado'],
            ['V_NOMBRE_ESTADO_CIVIL' => 'Divorciado'],
            ['V_NOMBRE_ESTADO_CIVIL' => 'Soltero'],
            ['V_NOMBRE_ESTADO_CIVIL' => 'Unión marital de hecho'],
            ['V_NOMBRE_ESTADO_CIVIL' => 'Viudo'],
        ]);
    }
}
