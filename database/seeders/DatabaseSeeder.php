<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Julia Paredes',
            'email' => 'jparedes@gmail.com',
            'password' => \Hash::make('hola123')
        ]);

        $user = User::create([
            'name' => 'Rodry',
            'email' => 'rodry_888@hotmail.com',
            'password' => \Hash::make('rodry2468')
        ]);


        $datos = [
            ['nombreFalta' => 'FaltaLeve_Art.186', 'estadoFalta' => '1'],
            ['nombreFalta' => 'FaltaGrave_Art.187', 'estadoFalta' => '1'],
            ['nombreFalta' => 'FaltaGravisima_Art.188', 'estadoFalta' => '1'],
            ['nombreFalta' => 'Otro', 'estadoFalta' => '1'],
        ];
        foreach ($datos as $dato) {
            \App\Models\Falta::create($dato);
        }
    }
}
