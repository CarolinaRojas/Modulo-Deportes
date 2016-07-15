<?php

use Illuminate\Database\Seeder;

class TallaTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TB_SRD_TALLA')->delete();        
        DB::table('TB_SRD_TALLA')->insert([
            /*ROPA FEMENINO*/
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '2', 'V_EU' => '32', 'V_UK' => '4', 'V_USA' => 'XS'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '2', 'V_EU' => '34', 'V_UK' => '6', 'V_USA' => 'S'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '2', 'V_EU' => '36', 'V_UK' => '8', 'V_USA' => 'S'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '2', 'V_EU' => '38', 'V_UK' => '10', 'V_USA' => 'M'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '2', 'V_EU' => '40', 'V_UK' => '12', 'V_USA' => 'M'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '2', 'V_EU' => '42', 'V_UK' => '14', 'V_USA' => 'L'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '2', 'V_EU' => '44', 'V_UK' => '16', 'V_USA' => 'L'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '2', 'V_EU' => '46', 'V_UK' => '18', 'V_USA' => 'XL'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '2', 'V_EU' => '48', 'V_UK' => '20', 'V_USA' => '1X'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '2', 'V_EU' => '50', 'V_UK' => '22', 'V_USA' => '2X'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '2', 'V_EU' => '52', 'V_UK' => '24', 'V_USA' => '3X'],
            
            
            /*ROPA MASCULINO*/            
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '1', 'V_EU' => '38', 'V_UK' => '28', 'V_USA' => '28'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '1', 'V_EU' => '40', 'V_UK' => '30', 'V_USA' => '30'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '1', 'V_EU' => '42', 'V_UK' => '32', 'V_USA' => '32'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '1', 'V_EU' => '44', 'V_UK' => '34', 'V_USA' => '34'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '1', 'V_EU' => '46', 'V_UK' => '36', 'V_USA' => '36'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '1', 'V_EU' => '48', 'V_UK' => '38', 'V_USA' => '38'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '1', 'V_EU' => '50', 'V_UK' => '40', 'V_USA' => '40'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '1', 'V_EU' => '52', 'V_UK' => '42', 'V_USA' => '42'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '1', 'V_EU' => '54', 'V_UK' => '44', 'V_USA' => '44'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '1', 'V_EU' => '56', 'V_UK' => '46', 'V_USA' => '46'],
            ['FK_I_ID_TIPO_TALLA' => '1', 'FK_I_ID_GENERO' => '1', 'V_EU' => '58', 'V_UK' => '48', 'V_USA' => '48'],
            
            /*CALZADO FEMENINO*/
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '2', 'V_EU' => '35', 'V_UK' => '2.5', 'V_USA' => '5'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '2', 'V_EU' => '35.5', 'V_UK' => '3', 'V_USA' => '5.5'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '2', 'V_EU' => '36', 'V_UK' => '3.5', 'V_USA' => '6'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '2', 'V_EU' => '37', 'V_UK' => '4', 'V_USA' => '6.5'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '2', 'V_EU' => '37.5', 'V_UK' => '4.5', 'V_USA' => '7'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '2', 'V_EU' => '38', 'V_UK' => '5', 'V_USA' => '8'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '2', 'V_EU' => '39', 'V_UK' => '6', 'V_USA' => '8.5'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '2', 'V_EU' => '40', 'V_UK' => '6', 'V_USA' => '9'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '2', 'V_EU' => '41', 'V_UK' => '7', 'V_USA' => '9.5'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '2', 'V_EU' => '42', 'V_UK' => '7.5', 'V_USA' => '10'],
            
                     
            /*CALZADO MASCULINO*/
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '1', 'V_EU' => '37.5', 'V_UK' => '5.5', 'V_USA' => '6'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '1', 'V_EU' => '38', 'V_UK' => '6', 'V_USA' => '6.5'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '1', 'V_EU' => '38.5', 'V_UK' => '6.5', 'V_USA' => '7'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '1', 'V_EU' => '39', 'V_UK' => '7', 'V_USA' => '7.5'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '1', 'V_EU' => '39.5', 'V_UK' => '7.5', 'V_USA' => '8'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '1', 'V_EU' => '40', 'V_UK' => '8', 'V_USA' => '8.5'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '1', 'V_EU' => '41', 'V_UK' => '8.5', 'V_USA' => '9'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '1', 'V_EU' => '42', 'V_UK' => '9', 'V_USA' => '9.5'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '1', 'V_EU' => '43', 'V_UK' => '9.5', 'V_USA' => '10'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '1', 'V_EU' => '44', 'V_UK' => '10', 'V_USA' => '10.5'],
            ['FK_I_ID_TIPO_TALLA' => '2', 'FK_I_ID_GENERO' => '1', 'V_EU' => '45', 'V_UK' => '10.5', 'V_USA' => '11'],
          
        ]);
    }
}
