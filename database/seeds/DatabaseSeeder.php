<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AgrupacionTablaSeeder::class);       
        $this->call(BancoTablaSeeder::class);
        $this->call(EstadoCivilTablaSeeder::class);
        $this->call(EstratoTablaSeeder::class);                   
        $this->call(TipoDeportistaTablaSeeder::class);       
        $this->call(DeporteTablaSeeder::class);     
        $this->call(ModalidadTablaSeeder::class);      
        $this->call(SituacionMilitarTablaSeeder::class);
        $this->call(ClubDeportivoSeeder::class);
        $this->call(TipoEstimuloTablaSeeder::class);
        $this->call(TipoCuentaTablaSeeder::class);
        $this->call(TipoEtapaTablaSeeder::class);
        $this->call(EtapaTablaSeeder::class);       
        $this->call(TipoTallatablaSeeder::class);        
        $this->call(TallaTablaSeeder::class);
        $this->call(EtapaEntrenamientoTablaSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(TipoDiscapacidadSeeder::class);
        $this->call(DeporteParalimpicoSeeder::class);
    }
}
