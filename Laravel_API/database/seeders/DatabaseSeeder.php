<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('clientes')->insert([
            'nombre' => 'Pepe',
            'apellido' => 'Aguilar',
            'edad' => '20',
            'salario' => '700',
        ]);
        DB::table('clientes')->insert([
            'nombre' => 'Cristian',
            'apellido' => 'Pineda',
            'edad' => '19',
            'salario' => '720',
        ]);
        DB::table('clientes')->insert([
            'nombre' => 'Angel',
            'apellido' => 'Sosa',
            'edad' => '20',
            'salario' => '720',
        ]);
        DB::table('clientes')->insert([
            'nombre' => 'Santos',
            'apellido' => 'Valdivieso',
            'edad' => '19',
            'salario' => '720',
        ]);
        DB::table('clientes')->insert([
            'nombre' => 'Victor',
            'apellido' => 'Caseres',
            'edad' => '19',
            'salario' => '720',
        ]);
        DB::table('clientes')->insert([
            'nombre' => 'Yael',
            'apellido' => 'Negreira',
            'edad' => '19',
            'salario' => '720',
        ]);
    }
}
