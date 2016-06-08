<?php

use Illuminate\Database\Seeder;

class TipoDeportistaTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_TIPO_DEPORTISTA')->delete();        
        DB::table('TB_SRD_TIPO_DEPORTISTA')->insert([
            ['V_NOMBRE_TIPO_DEPORTISTA' => 'Convencional'],
            ['V_NOMBRE_TIPO_DEPORTISTA' => 'Paralímpico'],
        ]);
        
    }
}
