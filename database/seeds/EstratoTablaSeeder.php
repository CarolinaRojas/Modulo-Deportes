<?php

use Illuminate\Database\Seeder;

class EstratoTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_ESTRATO')->delete();        
        DB::table('TB_SRD_ESTRATO')->insert([
            ['V_NOMBRE_ESTRATO' => '1'],
            ['V_NOMBRE_ESTRATO' => '2'],
            ['V_NOMBRE_ESTRATO' => '3'],
            ['V_NOMBRE_ESTRATO' => '4'],
            ['V_NOMBRE_ESTRATO' => '5'],            
            ['V_NOMBRE_ESTRATO' => '6'],
        ]);
    }
}
