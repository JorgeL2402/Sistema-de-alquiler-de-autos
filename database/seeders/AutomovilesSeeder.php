<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutomovilesSeeder extends Seeder
{
    public function run()
    {
        // Inserta datos de ejemplo en la tabla automoviles
        DB::table('automoviles')->insert([
            'modelo' => 'Modelo 1',
            'marca' => 'Marca 1',
            'año' => 2019,
            // Agrega más datos según tus necesidades
        ]);

        DB::table('automoviles')->insert([
            'modelo' => 'Modelo 2',
            'marca' => 'Marca 2',
            'año' => 2020,
            // Agrega más datos según tus necesidades
        ]);

        DB::table('automoviles')->insert([
            'modelo' => 'Modelo 3',
            'marca' => 'Marca 3',
            'año' => 2021,
            // Agrega más datos según tus necesidades
        ]);


        // Agrega más inserciones de datos según sea necesario
    }
}
