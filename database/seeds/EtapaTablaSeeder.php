<?php

use Illuminate\Database\Seeder;

class EtapaTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('TB_SRD_ETAPA')->delete();
        DB::table('TB_SRD_ETAPA')->insert([
            ['V_NOMBRE_ETAPA' => 'AVA ELI NAL II'],
            ['V_NOMBRE_ETAPA' => 'ELI'],
            ['V_NOMBRE_ETAPA' => 'ELI INT'],
            ['V_NOMBRE_ETAPA' => 'ELI INT I'],
            ['V_NOMBRE_ETAPA' => 'ELI INT III'],
            ['V_NOMBRE_ETAPA' => 'ELI INT IV'],
            ['V_NOMBRE_ETAPA' => 'ELI INT V'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL I'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL I ELI INT I'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL I ELI INT III'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL II'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL II ELI INT I'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL II ELI INT II'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL II ELI INT III'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL II ELI INT VI'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL III'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL III ELI INT I'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL III ELI INT II'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL IV'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL IV'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL IV ELI INT I'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL IV ELI INT III'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL V'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL V ELI INT I'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL V ELI INT VI'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL VI'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL VII ELI INT IV'],
            ['V_NOMBRE_ETAPA' => 'ELI NAL VIII ELI INT I'],
            ['V_NOMBRE_ETAPA' => 'ELI PARANAL  II'],
            ['V_NOMBRE_ETAPA' => 'ELI PARANAL  III'],
            ['V_NOMBRE_ETAPA' => 'ELI PARANAL  V'],
            ['V_NOMBRE_ETAPA' => 'ELI PARANAL I'],
            ['V_NOMBRE_ETAPA' => 'ELI PARANAL I ELI  INT I'],
            ['V_NOMBRE_ETAPA' => 'ELI PARANAL I ELI INT I'],
            ['V_NOMBRE_ETAPA' => 'ELI PARANAL I ELITE INT IV'],
            ['V_NOMBRE_ETAPA' => 'ELI PARANAL II'],
            ['V_NOMBRE_ETAPA' => 'ELI PARANAL II ELI INT I'],
            ['V_NOMBRE_ETAPA' => 'ELI PARANAL II ELI INT IV'],
            ['V_NOMBRE_ETAPA' => 'ELI PARANAL III'],
            ['V_NOMBRE_ETAPA' => 'ELI PARANAL III ELI INT I'],
            ['V_NOMBRE_ETAPA' => 'ELI PARANAL IV'],
            ['V_NOMBRE_ETAPA' => 'ELI PARANAL V'],
            ['V_NOMBRE_ETAPA' => 'ELI PARANAL VI'],
            ['V_NOMBRE_ETAPA' => 'ELITE PARANAL II'],
            ['V_NOMBRE_ETAPA' => 'R I'],
            ['V_NOMBRE_ETAPA' => 'R II'],
            ['V_NOMBRE_ETAPA' => 'RESERVA DEPORTIVA'],
        ]);
    }
}
