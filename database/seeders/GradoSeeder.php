<?php

namespace Database\Seeders;

use App\Models\Grado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grado::create([
            'id' => 1,
            'alumno_grado' => 'Primer_Grado',
        ]);

        Grado::create([
            'id' => 2,
            'alumno_grado' => 'Segundo_Grado',
        ]);

        Grado::create([
            'id' => 3,
            'alumno_grado' => 'Tercer_Grado',
        ]);

        Grado::create([
            'id' => 4,
            'alumno_grado' => 'Cuarto_Grado',
        ]);

        Grado::create([
            'id' => 5,
            'alumno_grado' => 'Quinto_Grado',
        ]);
    }
}
