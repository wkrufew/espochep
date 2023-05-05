<?php

namespace Database\Seeders;

use App\Models\Purchase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Purchase::create([
            'name_es' => 'INFIMA CUANTÍA',
            'name_en' => 'TINY AMOUNT',
        ]);
        Purchase::create([
            'name_es' => 'MENOR CUANTÍA',
            'name_en' => 'LESS AMOUNT',
        ]);
        Purchase::create([
            'name_es' => 'LICITACIÓN INTERNACIONAL',
            'name_en' => 'INTERNATIONAL TENDER
            ',
        ]);
        Purchase::create([
            'name_es' => 'SUBASTA INVERSA ELECTRÓNICA',
            'name_en' => 'ELECTRONIC REVERSE AUCTION',
        ]);
        Purchase::create([
            'name_es' => 'VERIFICACIÓN DE PRODUCCIÓN NACIONAL',
            'name_en' => 'NATIONAL PRODUCTION VERIFICATION',
        ]);
        Purchase::create([
            'name_es' => 'REGIMEN ESPECIAL',
            'name_en' => 'SPECIAL REGIME',
        ]);

        //$user->assignRole('Administrador');
        //User::factory(10)->create();
    }
}
