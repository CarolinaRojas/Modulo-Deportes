<?php

use Illuminate\Database\Seeder;

class TipoTallatablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_TIPO_TALLA')->delete();        
        DB::table('TB_SRD_TIPO_TALLA')->insert([
            ['V_NOMBRE_TIPO_TALLA' => 'ROPA'],
            ['V_NOMBRE_TIPO_TALLA' => 'CALZADO']
        ]);
    }
}
