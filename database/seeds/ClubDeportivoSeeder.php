<?php

use Illuminate\Database\Seeder;

class ClubDeportivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_CLUB_DEPORTIVO')->delete();        
        DB::table('TB_SRD_CLUB_DEPORTIVO')->insert([
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'Club Uno'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'Club Dos'],
        ]);
    }
}
