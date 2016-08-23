<?php

use Illuminate\Database\Seeder;

class TipoDiscapacidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_TIPO_DISCAPACIDAD')->delete();
        DB::table('TB_SRD_TIPO_DISCAPACIDAD')->insert([
            ['V_NOMBRE_DISCAPACIDAD' => 'Auditivo'],
            ['V_NOMBRE_DISCAPACIDAD' => 'Cognitivo'],
            ['V_NOMBRE_DISCAPACIDAD' => 'Físico'],
            ['V_NOMBRE_DISCAPACIDAD' => 'Parálisis cerebral'],
            ['V_NOMBRE_DISCAPACIDAD' => 'Visual'],
            ]);
    }
}
