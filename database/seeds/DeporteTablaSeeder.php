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
        DB::table('TB_SRD_DEPORTE')->delete();
        DB::table('TB_SRD_DEPORTE')->insert([
            ['V_NOMBRE_DEPORTE' => 'Actividades Subacuáticas'],
            ['V_NOMBRE_DEPORTE' => 'Ajedrez'],
            ['V_NOMBRE_DEPORTE' => 'Arqueria'],
            ['V_NOMBRE_DEPORTE' => 'Atletismo'],
            ['V_NOMBRE_DEPORTE' => 'Baloncesto'],
            ['V_NOMBRE_DEPORTE' => 'Beisbol'],
            ['V_NOMBRE_DEPORTE' => 'Billar'],
            ['V_NOMBRE_DEPORTE' => 'Bolo'],
            ['V_NOMBRE_DEPORTE' => 'Boxeo'],
            ['V_NOMBRE_DEPORTE' => 'Canotaje'],
            ['V_NOMBRE_DEPORTE' => 'Ciclismo'],
            ['V_NOMBRE_DEPORTE' => 'Ecuestre'],
            ['V_NOMBRE_DEPORTE' => 'Esgrima'],
            ['V_NOMBRE_DEPORTE' => 'Fútbol de Salón'],
            ['V_NOMBRE_DEPORTE' => 'Fútbol'],
            ['V_NOMBRE_DEPORTE' => 'Gimnasia'],
            ['V_NOMBRE_DEPORTE' => 'Judo'],
            ['V_NOMBRE_DEPORTE' => 'Karate'],
            ['V_NOMBRE_DEPORTE' => 'Lucha'],
            ['V_NOMBRE_DEPORTE' => 'Levantamiento de Pesas'],
            ['V_NOMBRE_DEPORTE' => 'Natación'],
            ['V_NOMBRE_DEPORTE' => 'Patinaje Artístico'],
            ['V_NOMBRE_DEPORTE' => 'Patinaje Carreras'],
            ['V_NOMBRE_DEPORTE' => 'Softbol'],
            ['V_NOMBRE_DEPORTE' => 'Squash'],
            ['V_NOMBRE_DEPORTE' => 'TaeKwondo'],
            ['V_NOMBRE_DEPORTE' => 'Tejo'],
            ['V_NOMBRE_DEPORTE' => 'Tenis de Mesa'],
            ['V_NOMBRE_DEPORTE' => 'Tenis'],
            ['V_NOMBRE_DEPORTE' => 'Tiro'],
            ['V_NOMBRE_DEPORTE' => 'Triathlon'],
            ['V_NOMBRE_DEPORTE' => 'Vela'],
            ['V_NOMBRE_DEPORTE' => 'Voleibol'],
            ['V_NOMBRE_DEPORTE' => 'Fútbol Sala'],
        ]);
    }
}
