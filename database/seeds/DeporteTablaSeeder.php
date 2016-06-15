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
        $terrestre = ['',
            'Ciclismo',
            'Ecuestre',
            'Patinaje Artístico',
            'Patinaje Carreras',
        ];
        
        $acuatico = ['',
            'Actividades Subacuáticas',
            'Canotaje',
            'Natación',
            'Vela'
        ];
        
        $arte = ['',
            'Ajedrez',
            'Arqueria',
            'Atletismo',
            'Billar',
            'Gimnasia',            
            'Levantamiento de Pesas',
            'Tejo',
            'Tiro',
            'Triathlon'
        ];
                
        $combate = ['',
            'Boxeo',
            'Esgrima',
            'Judo',
            'Karate',
            'Lucha',
            'TaeKwondo'
        ];
                
        $pelota = ['',
            'Baloncesto',
            'Beisbol',
            'Bolo',            
            'Fútbol',
            'Fútbol Sala',
            'Fútbol de Salón',
            'Softbol',
            'Squash',
            'Tenis de Mesa',
            'Tenis',
            'Voleibol'
        ];
        
        
        for ($contador = 1; $contador < count($terrestre); $contador ++) {
            DB::table('TB_SRD_DEPORTE')->insert([
                'FK_I_ID_AGRUPACION' => 1,
                'V_NOMBRE_DEPORTE' => ($terrestre [$contador])
            ]);
        }
        for ($contador = 1; $contador < count($acuatico); $contador ++) {
            DB::table('TB_SRD_DEPORTE')->insert([
                'FK_I_ID_AGRUPACION' => 2,
                'V_NOMBRE_DEPORTE' => ($acuatico [$contador])
            ]);
        }
        for ($contador = 1; $contador < count($arte); $contador ++) {
            DB::table('TB_SRD_DEPORTE')->insert([
                'FK_I_ID_AGRUPACION' => 3,
                'V_NOMBRE_DEPORTE' => ($arte [$contador])
            ]);
        }
        
        for ($contador = 1; $contador < count($combate); $contador ++) {
            DB::table('TB_SRD_DEPORTE')->insert([
                'FK_I_ID_AGRUPACION' => 4,
                'V_NOMBRE_DEPORTE' => ($combate [$contador])
            ]);
        }
        
        for ($contador = 1; $contador < count($pelota); $contador ++) {
            DB::table('TB_SRD_DEPORTE')->insert([
                'FK_I_ID_AGRUPACION' => 5,
                'V_NOMBRE_DEPORTE' => ($pelota [$contador])
            ]);
        }
    }
}