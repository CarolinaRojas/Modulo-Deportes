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
            ['PK_I_ID_AGRUPACION' => 1, 'V_NOMBRE_AGRUPACION' => 'Tiempo y marco terrestre (TMT)'],
            ['PK_I_ID_AGRUPACION' => 2 ,'V_NOMBRE_AGRUPACION' => 'Tiempo y marco acuático (TMA)'],
            ['PK_I_ID_AGRUPACION' => 3, 'V_NOMBRE_AGRUPACION' => 'Arte competitivo y precisión (ACP)'],
            ['PK_I_ID_AGRUPACION' => 4, 'V_NOMBRE_AGRUPACION' => 'Combate (COM)'],
            ['PK_I_ID_AGRUPACION' => 5, 'V_NOMBRE_AGRUPACION' => 'Pelota (PEL)']
        ]);
    }
}