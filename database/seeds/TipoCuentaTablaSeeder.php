<?php

use Illuminate\Database\Seeder;

class TipoCuentaTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('TB_SRD_TIPO_CUENTA')->delete();        
        DB::table('TB_SRD_TIPO_CUENTA')->insert([
            ['V_NOMBRE_TIPO_CUENTA' => 'Cuenta ahorros'],            
            ['V_NOMBRE_TIPO_CUENTA' => 'Cuenta corriente'],            
            ['V_NOMBRE_TIPO_CUENTA' => 'No tiene'],            
        ]);
    }
}
