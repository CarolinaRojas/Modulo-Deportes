<?php

use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_DIVISION')->delete();
        DB::table('TB_SRD_DIVISION')->insert([
            ['FK_I_ID_MODALIDAD' => 1, 'V_NOMBRE_DIVISION' => 'C1500'],//1
            ['FK_I_ID_MODALIDAD' => 1, 'V_NOMBRE_DIVISION' => 'C2000'],//2
            ['FK_I_ID_MODALIDAD' => 1, 'V_NOMBRE_DIVISION' => 'C2200'],//3
            ['FK_I_ID_MODALIDAD' => 2, 'V_NOMBRE_DIVISION' => 'K4500'],//4
            ['FK_I_ID_MODALIDAD' => 2, 'V_NOMBRE_DIVISION' => 'K2200'],//5
            ['FK_I_ID_MODALIDAD' => 2, 'V_NOMBRE_DIVISION' => 'K4000'],//6
            ['FK_I_ID_MODALIDAD' => 3, 'V_NOMBRE_DIVISION' => 'Individual'],//7
            ['FK_I_ID_MODALIDAD' => 3, 'V_NOMBRE_DIVISION' => 'Equipo'],//8
            ['FK_I_ID_MODALIDAD' => 4, 'V_NOMBRE_DIVISION' => 'Individual'],//9
            ['FK_I_ID_MODALIDAD' => 4, 'V_NOMBRE_DIVISION' => 'Equipo'],//10
            ['FK_I_ID_MODALIDAD' => 5, 'V_NOMBRE_DIVISION' => 'Individual'],//11
            ['FK_I_ID_MODALIDAD' => 5, 'V_NOMBRE_DIVISION' => 'Equipo'],//12
            ['FK_I_ID_MODALIDAD' => 6, 'V_NOMBRE_DIVISION' => '100'],//13
            ['FK_I_ID_MODALIDAD' => 6, 'V_NOMBRE_DIVISION' => '800'],//14
            ['FK_I_ID_MODALIDAD' => 7, 'V_NOMBRE_DIVISION' => 'Bala'],//15
            ['FK_I_ID_MODALIDAD' => 7, 'V_NOMBRE_DIVISION' => 'Disco'],//16
            ]);
    }
}
