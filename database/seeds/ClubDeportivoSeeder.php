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
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'A PLENO TENIS'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => '100 % MOTOCROSS'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'PIRATAS JUNIOR BASKETBALL CLUB'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ATLETICO CHACARITA JUNIORS FILIAL COLOMBIA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ANDINO FUTBOL CLUB'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'A.C. SUR'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'A1'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ABALB'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA ALEMANA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA BOGOTANA DE FUTBOL'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA BOGOTANA DE TALENTOS'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA COLOMBIA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA COLOMBIANA DE FUTBOL ACOFUTBOL'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA CRISTIANA FUTBOL FEMENINO'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA DE BEISBOL AGUILAS CAPITALINAS'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA DE FUTBOL ANTONIO NARIÑO L.15'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA DE FUTBOL LEEDS UNITED â (antes SPORT TEAM CLUB)'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA DE TALENTOS FUTBOL CLUB'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA DELFOS'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA EL DIAMANTE'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA ESTUDIANTES'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA FRANCESA DE FUTBOL'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA FUTBOL CLUB BOGOTA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA IGUARAN FC'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACADEMIA NACIONAL DE FUTBOL'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACCA DE TIRO Y CAZA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACCIONES'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACIP LA ROMA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACUEDUCTO FUTBOL'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'DE KARATE DO ACUEDUCTO'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ACUEDUCTO TEJO'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ADB'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ADI LA COCHITA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ADVANTIX'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AEROCLUB BOGOTA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AEROCLUB PARACAIDISMO COLOMBIA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AEROSOUL'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AEROSTACION'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AGAPUS'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AGROSERVICIOS EL CAMINO'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AGUILAS'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AGUILAS COLOMBIA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AGUILAS DEL SOL'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AGUILAS SPORTING'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AHIMSA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AJAX FCM FUTBOL CLUB'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AJEDREZ UNIVERSITARIO'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AKUATOR'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALADINO RACQUET CLUB'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALAND'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALBA REAL'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALBATROS'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALBATROS CYCLING TEAM'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALCATRAZ'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALCAZARES'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALEGRIA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALEGRIA â ROLLING STARS'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALEJANDRINOS'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALEXANDRA VIVAS'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALEXMAN'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALFONSO CAÑON'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALFONSO LOPEZ LA VELEÑITA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALFONSO SEPULVEDA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALIANZA BOGOTA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALIANZA ECUESTRE (Gamboa)'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALIANZA F.C.'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALIANZA JR'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALIANZA M-3 FUTSAL'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALIANZA RUCBY FOOTBALL CLUB'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALIANZA SPORT'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALIANZA SUBA F.C.'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALL POWERS SPORTAEROBICS'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALLEGRO NICOLAS FEDERMAN'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALLEMANG'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALMIRANTE COLON'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALPINE'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALTAVISTA CAMPEONES CON CORAZÃN'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ALTIUS EAT'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AMAZONAS'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AMBALA F.C.'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AMERICA EXTREMO'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AMERICA TENIS CLUB Social'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AMERICANINOS F.C.'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AMERIOL SKATE CLUB'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AMIGOS DEL AGUA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AMIGOS DEL VOLEIBOL'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AMISTAD'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ANDECRAC'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ANDES F.C.'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ANDINOS'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ANDRES ESCOBAR'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ANDRZEJ GRUBBA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ANGEL F.M. BOXING CLUB'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'LOS ANGELES'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ANGELES FUTBOL'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ANGELS SKATE CLUB'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ANONIMOS RUGBY'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ANTARES DE LA SABANA'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'ANTILOPES BASKETBALL CLUB '],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'AÑOS MARAVILLOSOS'],
            ['V_NOMBRE_CLUB_DEPORTIVO' => 'APA - LTB']//104
            ]);
    }
}