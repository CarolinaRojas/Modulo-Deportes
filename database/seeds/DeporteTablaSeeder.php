<?php

use Illuminate\Database\Seeder;

class DeporteTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $arte = ['',
            'Ajedrez',
            'Arqueria(C+R)',
            'Billar',
            'Bolo',
            'Ecuestre',
            'Gimnasia',
            'Golf',
            'Patinaje artístico',
            'Tejo',
            'Tiro'
        ];
        for ($contador = 1; $contador < count($arte); $contador ++) {
            DB::table('TB_SRD_DEPORTE')->insert([
                'FK_I_ID_AGRUPACION' => 1,
                'V_NOMBRE_DEPORTE' => ($arte [$contador])
            ]);
        }
        
        $combate = ['',
            'Boxeo',
            'Esgrima',
            'Judo',
            'Karate',
            'Lucha',
            'TaeKwondo'
        ];
        for ($contador = 1; $contador < count($combate); $contador ++) {
            DB::table('TB_SRD_DEPORTE')->insert([
                'FK_I_ID_AGRUPACION' => 2,
                'V_NOMBRE_DEPORTE' => ($combate [$contador])
            ]);
        }
             
        $pelota = ['',
            'Badminton',
            'Baloncesto',
            'Balón Mano',
            'Beisbol',      
            'Fútbol',
            'Fútbol de Salón',
            'Rugby',
            'Softbol',
            'Squash',
            'Tenis',
            'Tenis de Mesa',
            'Tenis',
            'Voleibol'
        ];
        
        for ($contador = 1; $contador < count($pelota); $contador ++) {
            DB::table('TB_SRD_DEPORTE')->insert([
                'FK_I_ID_AGRUPACION' => 3,
                'V_NOMBRE_DEPORTE' => ($pelota [$contador])
            ]);
        }
         $acuatico = ['',
            'Actividades Subacuáticas',
            'Esquí Náutico' ,
            'Natación',
            'Triathlon',
            'Vela'
        ];
        for ($contador = 1; $contador < count($acuatico); $contador ++) {
            DB::table('TB_SRD_DEPORTE')->insert([
                'FK_I_ID_AGRUPACION' => 4,
                'V_NOMBRE_DEPORTE' => ($acuatico [$contador])
            ]);
        }
        
        $terrestre = ['',
            'Atletismo',
            'Canotaje',
            'Ciclismo',
            'Levantamiento de pesas',
            'Patinaje Carreras',
        ];        
        for ($contador = 1; $contador < count($terrestre); $contador ++) {
            DB::table('TB_SRD_DEPORTE')->insert([
                'FK_I_ID_AGRUPACION' => 5,
                'V_NOMBRE_DEPORTE' => ($terrestre [$contador])
            ]);
        }
    }
}