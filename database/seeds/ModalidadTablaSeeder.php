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
        $futbol = ['',
            'Uno Fútbol',
            'Dos Fútbol',
        ];
        
        $tenis =['',
            'Uno Tennis',
            'Dos Tennis'
            ];
        
        DB::table('TB_SRD_MODALIDAD')->delete();        
        
        for ($contador = 1; $contador < count($futbol); $contador ++) {
            DB::table('TB_SRD_MODALIDAD')->insert([
                'FK_I_ID_DEPORTE' => 1,
                'V_NOMBRE_MODALIDAD' => ($futbol [$contador])
            ]);
        }
        for ($contador = 1; $contador < count($tenis); $contador ++) {
            DB::table('TB_SRD_MODALIDAD')->insert([
                'FK_I_ID_DEPORTE' => 2,
                'V_NOMBRE_MODALIDAD' => ($tenis [$contador])
            ]);
        }
    }
}
