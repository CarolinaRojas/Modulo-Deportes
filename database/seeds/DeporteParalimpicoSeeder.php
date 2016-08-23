<?php

use Illuminate\Database\Seeder;

class DeporteParalimpicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_DEPORTE_PARALIMPICO')->delete();
        DB::table('TB_SRD_DEPORTE_PARALIMPICO')->insert([
            ['FK_I_ID_DIVISION' => 13, 'FK_I_ID_TIPO_DISCAPACIDAD'=>1, 'V_FUNCIONALIDAD'=>'A12'],
            ['FK_I_ID_DIVISION' => 13, 'FK_I_ID_TIPO_DISCAPACIDAD'=>2, 'V_FUNCIONALIDAD'=>'C12'],
            ['FK_I_ID_DIVISION' => 14, 'FK_I_ID_TIPO_DISCAPACIDAD'=>1, 'V_FUNCIONALIDAD'=>'A12'],
            ['FK_I_ID_DIVISION' => 14, 'FK_I_ID_TIPO_DISCAPACIDAD'=>2, 'V_FUNCIONALIDAD'=>'C12'],
            ['FK_I_ID_DIVISION' => 15, 'FK_I_ID_TIPO_DISCAPACIDAD'=>3, 'V_FUNCIONALIDAD'=>'F12'],
            ['FK_I_ID_DIVISION' => 15, 'FK_I_ID_TIPO_DISCAPACIDAD'=>5, 'V_FUNCIONALIDAD'=>'V12'],
            ['FK_I_ID_DIVISION' => 16, 'FK_I_ID_TIPO_DISCAPACIDAD'=>3, 'V_FUNCIONALIDAD'=>'F12'],
            ['FK_I_ID_DIVISION' => 16, 'FK_I_ID_TIPO_DISCAPACIDAD'=>5, 'V_FUNCIONALIDAD'=>'V12'],
            ]);
    }
}