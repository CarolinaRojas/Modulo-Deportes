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
        DB::table('TB_SRD_MODALIDAD')->delete();
        DB::table('TB_SRD_MODALIDAD')->insert([
            ['FK_I_ID_DEPORTE' => 1, 'V_NOMBRE_MODALIDAD' => 'Canoa'],
            ['FK_I_ID_DEPORTE' => 1, 'V_NOMBRE_MODALIDAD' => 'Kayak'],
            ['FK_I_ID_DEPORTE' => 2, 'V_NOMBRE_MODALIDAD' => 'Florete'],
            ['FK_I_ID_DEPORTE' => 2, 'V_NOMBRE_MODALIDAD' => 'Sable'],
            ['FK_I_ID_DEPORTE' => 2, 'V_NOMBRE_MODALIDAD' => 'Espada'],
            ['FK_I_ID_DEPORTE' => 3, 'V_NOMBRE_MODALIDAD' => 'Pista'],
            ['FK_I_ID_DEPORTE' => 3, 'V_NOMBRE_MODALIDAD' => 'Campo'],
            /******ARTE********/
           /* ['FK_I_ID_DEPORTE' => 1, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 2, 'V_NOMBRE_MODALIDAD' => 'No aplica'],            
            ['FK_I_ID_DEPORTE' => 3, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 4, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 5, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 7, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 8, 'V_NOMBRE_MODALIDAD' => 'No aplica'],            
            ['FK_I_ID_DEPORTE' => 9, 'V_NOMBRE_MODALIDAD' => 'No aplica'],            
            /******COMBATE********/
          /*  ['FK_I_ID_DEPORTE' => 11, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 12, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 13, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 14, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 15, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 16, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            /*******PELOTA*********/
           /* ['FK_I_ID_DEPORTE' => 17, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 18, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 19, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 20, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 22, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 23, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 24, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 25, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 26, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 27, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 28, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            /*******ACUATICO*********/
           /* ['FK_I_ID_DEPORTE' => 31, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 33, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 34, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            /*******TERRESTRE*********/
           /* ['FK_I_ID_DEPORTE' => 36, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 38, 'V_NOMBRE_MODALIDAD' => 'No aplica'],
            ['FK_I_ID_DEPORTE' => 39, 'V_NOMBRE_MODALIDAD' => 'No aplica'],*/
        ]);
      /*  $gimnasia = ['Artística', 'Rítmica'];
        for ($contador = 0; $contador < count($gimnasia); $contador ++) {
            DB::table('TB_SRD_MODALIDAD')->insert([
                'FK_I_ID_DEPORTE' => 6,
                'V_NOMBRE_MODALIDAD' => ($gimnasia [$contador])
            ]);
        }
        $tiro = ['Rifles', 'Pistolas', 'Escopetas'];
        for ($contador = 0; $contador < count($tiro); $contador ++) {
            DB::table('TB_SRD_MODALIDAD')->insert([
                'FK_I_ID_DEPORTE' => 10,
                'V_NOMBRE_MODALIDAD' => ($tiro [$contador])
            ]);
        }
        $futbol = ['Fútbol Sala'];
        for ($contador = 0; $contador < count($futbol); $contador ++) {
            DB::table('TB_SRD_MODALIDAD')->insert([
                'FK_I_ID_DEPORTE' => 21,
                'V_NOMBRE_MODALIDAD' => ($futbol [$contador])
            ]);
        }      
        $voleibol = ['Coliseo', 'Arena'];
        for ($contador = 0; $contador < count($voleibol); $contador ++) {
            DB::table('TB_SRD_MODALIDAD')->insert([
                'FK_I_ID_DEPORTE' => 29,
                'V_NOMBRE_MODALIDAD' => ($voleibol [$contador])
            ]);
        }
        $subacuaticas = ['Piscina', 'Aguas abiertas'];
        for ($contador = 0; $contador < count($subacuaticas); $contador ++) {
            DB::table('TB_SRD_MODALIDAD')->insert([
                'FK_I_ID_DEPORTE' => 30,
                'V_NOMBRE_MODALIDAD' => ($subacuaticas [$contador])
            ]);
        }
        $natacion = ['Carreras', 'Clavados', 'Polo', 'Sincronizado'];
        for ($contador = 0; $contador < count($natacion); $contador ++) {
            DB::table('TB_SRD_MODALIDAD')->insert([
                'FK_I_ID_DEPORTE' => 32,
                'V_NOMBRE_MODALIDAD' => ($natacion [$contador])
            ]);
        }
        $atletismo = ['Fondo', 'Semi-fondo', 'Marcha', 'Velocidad', 'Saltos', 'Lanzamientos'];
        for ($contador = 0; $contador < count($atletismo); $contador ++) {
            DB::table('TB_SRD_MODALIDAD')->insert([
                'FK_I_ID_DEPORTE' => 35,
                'V_NOMBRE_MODALIDAD' => ($atletismo [$contador])
            ]);
        }
        $ciclismo = ['Ciclismo ruta', 'Ciclismo pista', 'Ciclismo BMX', 'Ciclo-montañismo'];
        for ($contador = 0; $contador < count($ciclismo); $contador ++) {
            DB::table('TB_SRD_MODALIDAD')->insert([
                'FK_I_ID_DEPORTE' => 37,
                'V_NOMBRE_MODALIDAD' => ($ciclismo [$contador])
            ]);
        }*/
    }
}
