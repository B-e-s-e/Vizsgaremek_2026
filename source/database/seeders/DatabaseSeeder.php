<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* ================= FELHASZNALOK ================= */
        DB::table('felhasznalok')->insert([
            ['nev'=>'Kovács István','phonenumber'=>'06201110001','email'=>'istvan.kovacs1@example.com'],
            ['nev'=>'Szabó Mária','phonenumber'=>'06201110002','email'=>'maria.szabo2@example.com'],
            ['nev'=>'Varga Lajos','phonenumber'=>'06201110003','email'=>'lajos.varga3@example.com'],
            ['nev'=>'Horváth Kitti','phonenumber'=>'06201110004','email'=>'kitti.horvath4@example.com'],
            ['nev'=>'Török Zsófi','phonenumber'=>'06201110005','email'=>'zsofi.torok5@example.com'],
            ['nev'=>'Lakatos Béla','phonenumber'=>'06201110006','email'=>'bela.lakatos6@example.com'],
            ['nev'=>'Farkas Edit','phonenumber'=>'06201110007','email'=>'edit.farkas7@example.com'],
            ['nev'=>'Szalai Attila','phonenumber'=>'06201110008','email'=>'attila.szalai8@example.com'],
            ['nev'=>'Tóth Nóra','phonenumber'=>'06201110009','email'=>'nora.toth9@example.com'],
            ['nev'=>'Molnár Erika','phonenumber'=>'06201110010','email'=>'erika.molnar10@example.com'],
            ['nev'=>'Jakab Imre','phonenumber'=>'06201110011','email'=>'imre.jakab11@example.com'],
            ['nev'=>'Balogh Csilla','phonenumber'=>'06201110012','email'=>'csilla.balogh12@example.com'],
            ['nev'=>'Oláh Dénes','phonenumber'=>'06201110013','email'=>'denes.olah13@example.com'],
            ['nev'=>'Papp Lili','phonenumber'=>'06201110014','email'=>'lili.papp14@example.com'],
            ['nev'=>'Kocsis Máté','phonenumber'=>'06201110015','email'=>'mate.kocsis15@example.com'],
            ['nev'=>'Fehér Réka','phonenumber'=>'06201110016','email'=>'reka.feher16@example.com'],
            ['nev'=>'Nemes Gergő','phonenumber'=>'06201110017','email'=>'gergo.nemes17@example.com'],
            ['nev'=>'Halász Dóra','phonenumber'=>'06201110018','email'=>'dora.halasz18@example.com'],
            ['nev'=>'Veres András','phonenumber'=>'06201110019','email'=>'andras.veres19@example.com'],
            ['nev'=>'Bognár Lili','phonenumber'=>'06201110020','email'=>'lili.bognar20@example.com'],
            ['nev'=>'Major László','phonenumber'=>'06201110021','email'=>'laszlo.major21@example.com'],
            ['nev'=>'Sipos Petra','phonenumber'=>'06201110022','email'=>'petra.sipos22@example.com'],
            ['nev'=>'Király Áron','phonenumber'=>'06201110023','email'=>'aron.kiraly23@example.com'],
            ['nev'=>'Tamás Levente','phonenumber'=>'06201110024','email'=>'levente.tamas24@example.com'],
            ['nev'=>'Gulyás Hanna','phonenumber'=>'06201110025','email'=>'hanna.gulyas25@example.com'],
            ['nev'=>'Barta Ádám','phonenumber'=>'06201110026','email'=>'adam.barta26@example.com'],
            ['nev'=>'Mészáros Klára','phonenumber'=>'06201110027','email'=>'klara.meszaros27@example.com'],
            ['nev'=>'Orbán Dávid','phonenumber'=>'06201110028','email'=>'david.orban28@example.com'],
            ['nev'=>'Huber Marcell','phonenumber'=>'06201110029','email'=>'marcell.huber29@example.com'],
            ['nev'=>'Pintér Lili','phonenumber'=>'06201110030','email'=>'lili.pinter30@example.com'],
            ['nev'=>'Boros Gábor','phonenumber'=>'06201110031','email'=>'gabor.boros31@example.com'],
            ['nev'=>'Vass Regina','phonenumber'=>'06201110032','email'=>'regina.vass32@example.com'],
            ['nev'=>'Tánczos Bence','phonenumber'=>'06201110033','email'=>'bence.tanczos33@example.com'],
            ['nev'=>'Kelemen Eszter','phonenumber'=>'06201110034','email'=>'eszter.kelemen34@example.com'],
            ['nev'=>'Orosz Júlia','phonenumber'=>'06201110035','email'=>'julia.orosz35@example.com'],
            ['nev'=>'Lovas Soma','phonenumber'=>'06201110036','email'=>'soma.lovas36@example.com'],
            ['nev'=>'Barna Zoltán','phonenumber'=>'06201110037','email'=>'zoltan.barna37@example.com'],
            ['nev'=>'Házi Dénes','phonenumber'=>'06201110038','email'=>'denes.hazi38@example.com'],
            ['nev'=>'Márton Boglárka','phonenumber'=>'06201110039','email'=>'boglarka.marton39@example.com'],
            ['nev'=>'Csonka Kevin','phonenumber'=>'06201110040','email'=>'kevin.csonka40@example.com'],
        ]);

        /* ================= TAKARITOK ================= */
        DB::table('takaritok')->insert(
            collect(range(1,40))->map(fn($i) => [
                'nev' => [
                    'Bíró Tamás','Varga Csaba','Tóth Zoltán','Kiss Laura','Molnár Bence',
                    'Horváth Eszter','Kovács Richárd','Szabó Dániel','Farkas Fanni','Papp Balázs',
                    'Olivér Nagy','Török Edina','Kelemen Balázs','Szalai Lilla','Király Norbert',
                    'Boros Rebeka','Nemes Viktor','Vass Emese','Barta Gergely','Orosz Réka',
                    'Sipos Dániel','Lakatos Bettina','Fehér Tamara','Jakab Olivér','Major Csilla',
                    'Oláh Márton','Veres Fanni','Bognár Levente','Huber Vivien','Pintér Kevin',
                    'Balogh Zita','Halász Máté','Barna Dóra','Mészáros László','Orbán Patrik',
                    'Gulyás Noémi','Tánczos Milán','Lovas Virág','Kocsis Bálint','Csonka Dorina'
                ][$i-1],
                'phonenumber' => '067090000' . str_pad($i, 2, '0', STR_PAD_LEFT)
            ])->toArray()
        );

        /* ================= AUTOK ================= */
        DB::table('autok')->insert(
            collect(range(1,40))->map(fn($i) => [
                'marka' => [
                    'Toyota','Honda','BMW','Audi','Mercedes','Ford','Opel','Kia','Hyundai','Skoda',
                    'Seat','Mazda','Volvo','Renault','Peugeot','Citroen','Dacia','Suzuki','Fiat','Nissan',
                    'Toyota','BMW','Audi','Volkswagen','Mazda','Hyundai','Kia','Ford','Honda','Mercedes',
                    'Opel','Renault','Skoda','Seat','Peugeot','Suzuki','Nissan','Volvo','Fiat','Toyota'
                ][$i-1],
                'tipus' => [
                    'Yaris','Civic','320d','A4','C200','Mondeo','Astra','Ceed','i30','Octavia',
                    'Leon','3','S60','Megane','308','C4','Duster','Swift','Tipo','Qashqai',
                    'Corolla','X3','Q5','Passat','CX-5','Tucson','Sportage','Focus','Jazz','GLA',
                    'Corsa','Clio','Fabia','Ibiza','208','Vitara','Micra','V40','Panda','Avensis'
                ][$i-1],
                'evjarat' => [2019,2017,2020,2018,2021,2016,2015,2020,2019,2018,2017,2020,2019,2018,2017,2016,2021,2019,2018,2020,2021,2018,2019,2017,2020,2021,2018,2017,2016,2019,2020,2018,2017,2016,2019,2021,2018,2017,2016,2015][$i-1],
                'rendszam' => 'AAA-' . (100 + $i),
                'felhasznalo' => $i
            ])->toArray()
        );

        /* ================= MUNKAK ================= */
        DB::table('munkak')->insert(
            collect(range(1,40))->map(fn($i) => [
                'auto' => $i,
                'felhasznalo' => $i,
                'takarito' => $i,
                'datum' => now()->startOfYear()->addDays($i * 3)->toDateString()
            ])->toArray()
        );

        /* ================= SZOLGALTATASOK ================= */
        DB::table('szolgaltatasok')->insert(
            collect(range(1,40))->map(fn($i) => [
                'munka' => $i,
                'ar' => [15000,18000,12000,20000,10000,16000,13500,22000,17500,14500,
                         19000,21000,12500,9500,18500,17000,20000,15500,12000,23000,
                         14000,16500,18000,19500,21000,17500,15500,16000,14500,24000,
                         22000,13500,18000,15000,20000,23000,17000,15500,19000,16500][$i-1]
            ])->toArray()
        );
    }
}
