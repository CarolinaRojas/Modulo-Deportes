<?php

use Illuminate\Database\Seeder;

class AgrupacionTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_AGRUPACION')->delete();
        DB::table('TB_SRD_AGRUPACION')->insert([
            ['V_NOMBRE_AGRUPACION' => 'Tiempo y marco terrestre (TMT)'],
            ['V_NOMBRE_AGRUPACION' => 'Tiempo y marco acuático (TMA)'],
            ['V_NOMBRE_AGRUPACION' => 'Arte competitivo y precisión (ACP)'],
            ['V_NOMBRE_AGRUPACION' => 'Combate (COM)'],
            ['V_NOMBRE_AGRUPACION' => 'Pelota (PEL)'],
        ]);
    }
}