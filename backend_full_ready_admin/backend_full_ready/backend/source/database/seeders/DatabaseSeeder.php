<?php

namespace Database\Seeders;

use App\Models\Auto;
use App\Models\Felhasznalo;
use App\Models\Munka;
use App\Models\Szolgaltatas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = Felhasznalo::create([
            'nev' => 'Demo Felhasználó',
            'phonenumber' => '06301234567',
            'email' => 'demo@vizsga.hu',
            'password' => Hash::make('password123'),
            'api_token' => null,
            'role' => 'user',
        ]);

        Felhasznalo::create([
            'nev' => 'Admin Felhasználó',
            'phonenumber' => '06309998888',
            'email' => 'admin@vizsga.hu',
            'password' => Hash::make('admin123'),
            'api_token' => null,
            'role' => 'admin',
        ]);

        $services = [
            ['nev' => 'Express külső mosás', 'leiras' => 'Kézi habos mosás, felni- és gumiápolás, gyors szárítás.', 'ar' => 5990, 'idotartam' => '45 perc'],
            ['nev' => 'Belső frissítő tisztítás', 'leiras' => 'Porszívózás, műanyagápolás, üvegtisztítás, illatosítás.', 'ar' => 8990, 'idotartam' => '60 perc'],
            ['nev' => 'Prémium teljes tisztítás', 'leiras' => 'Teljes belső és külső takarítás kárpittisztítással és viaszolással.', 'ar' => 14990, 'idotartam' => '120 perc'],
        ];
        foreach ($services as $service) {
            Szolgaltatas::create($service);
        }

        $car = Auto::create([
            'marka' => 'Toyota',
            'tipus' => 'Corolla',
            'evjarat' => 2020,
            'rendszam' => 'ABC-123',
            'szin' => 'Ezüst',
            'felhasznalo_id' => $user->id,
        ]);

        Munka::create([
            'auto_id' => $car->id,
            'felhasznalo_id' => $user->id,
            'szolgaltatas_id' => 3,
            'datum' => now()->addDays(3)->toDateString(),
            'helyszin' => 'Ózd, Vasvár út 12.',
            'megjegyzes' => 'Kapucsengő: 3-as',
            'ar' => 14990,
            'allapot' => 'Foglalva',
        ]);
    }
}
