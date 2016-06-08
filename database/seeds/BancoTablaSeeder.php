<?php

use Illuminate\Database\Seeder;

class BancoTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_BANCO')->delete();        
        DB::table('TB_SRD_BANCO')->insert([
            ['V_NOMBRE_BANCO' => 'ANIF'],
            ['V_NOMBRE_BANCO' => 'Asobancaria'],
            ['V_NOMBRE_BANCO' => 'BBVA'],
            ['V_NOMBRE_BANCO' => 'Bancamia'],
            ['V_NOMBRE_BANCO' => 'Bancolombia'],
            ['V_NOMBRE_BANCO' => 'Banco Agrario'],
            ['V_NOMBRE_BANCO' => 'Banco AV Villas'],
            ['V_NOMBRE_BANCO' => 'Banco Caja Social'],
            ['V_NOMBRE_BANCO' => 'Banco Colpatria'],
            ['V_NOMBRE_BANCO' => 'Banco Coomeva'],
            ['V_NOMBRE_BANCO' => 'Banco Corpbanca'],
            ['V_NOMBRE_BANCO' => 'Banco de Bogota'],
            ['V_NOMBRE_BANCO' => 'Banco de la República'],
            ['V_NOMBRE_BANCO' => 'Banco de Occidente'],
            ['V_NOMBRE_BANCO' => 'Banco Falabella'],
            ['V_NOMBRE_BANCO' => 'Banco Finandina'],
            ['V_NOMBRE_BANCO' => 'Banco GNB Sudameris'],
            ['V_NOMBRE_BANCO' => 'Banco Pichincha'],
            ['V_NOMBRE_BANCO' => 'Banco Popular'],
            ['V_NOMBRE_BANCO' => 'Banco Procredito'],
            ['V_NOMBRE_BANCO' => 'Banco WWB'],
            ['V_NOMBRE_BANCO' => 'CitiBank'],
            ['V_NOMBRE_BANCO' => 'Davivienda'],
            ['V_NOMBRE_BANCO' => 'Fogafin'],
            ['V_NOMBRE_BANCO' => 'Helm Bank'],
            ['V_NOMBRE_BANCO' => 'HSBC Colombia'],
            ['V_NOMBRE_BANCO' => 'Scotiabank'],
            ['V_NOMBRE_BANCO' => 'Superfinanciera'],
        ]);
    }
}
