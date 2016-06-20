<?php

use Illuminate\Database\Seeder;

class TallaTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_TALLA')->delete();        
        DB::table('TB_SRD_TALLA')->insert([
            ['V_NOMBRE_TALLA' => '4'],
            ['V_NOMBRE_TALLA' => '6'],
            ['V_NOMBRE_TALLA' => '8'],
            ['V_NOMBRE_TALLA' => '10'],
            ['V_NOMBRE_TALLA' => '12'],
            ['V_NOMBRE_TALLA' => '14'],
            ['V_NOMBRE_TALLA' => '16'],
            ['V_NOMBRE_TALLA' => '18'],
            ['V_NOMBRE_TALLA' => 'XS'],
            ['V_NOMBRE_TALLA' => 'S'],
            ['V_NOMBRE_TALLA' => 'M'],
            ['V_NOMBRE_TALLA' => 'L'],
            ['V_NOMBRE_TALLA' => 'XL'],
            ['V_NOMBRE_TALLA' => 'XXL'],
            ['V_NOMBRE_TALLA' => 'XXL'],
        ]);
    }
}
