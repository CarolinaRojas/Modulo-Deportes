<?php

use Illuminate\Database\Seeder;

class TipoEstimuloTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_TIPO_ESTIMULO')->delete();        
        DB::table('TB_SRD_TIPO_ESTIMULO')->insert([
            ['V_NOMBRE_ESTIMULO' => 'Estímulo mensual'],
            ['V_NOMBRE_ESTIMULO' => 'Educación'],
            ['V_NOMBRE_ESTIMULO' => 'Estímulo por resultados'],
            ['V_NOMBRE_ESTIMULO' => 'Alimentación'],
            ['V_NOMBRE_ESTIMULO' => 'Hidratantes, ayudas y complementos'],
            ['V_NOMBRE_ESTIMULO' => 'Inversión multi-disciplinaria'],
            ['V_NOMBRE_ESTIMULO' => 'Monitorias'],
        ]);
    }
}
