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
        $this->call(EtapaTablaSeeder::class);       
        $this->call(BarrioTablaSeeder::class);       
        $this->call(ModalidadTablaSeeder::class);      
        $this->call(SituacionMilitarTablaSeeder::class);
    }
}
