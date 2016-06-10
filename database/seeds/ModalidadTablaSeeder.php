<?php

use Illuminate\Database\Seeder;

class ModalidadTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                DB::table('TB_SRD_MODALIDAD')->delete();        
        DB::table('TB_SRD_MODALIDAD')->insert([
            ['V_NOMBRE_MODALIDAD' => 'Dato prueba Uno'],
            ['V_NOMBRE_MODALIDAD' => 'Dato prueba Dos'],
            ['V_NOMBRE_MODALIDAD' => 'Dato prueba Tres'],
        ]);
    }
}
