<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'primer_nombre' => $this->faker->firstName,
        'segundo_nombre' => $this->faker->firstName,
        'primer_apellido' => $this->faker->lastName,
        'segundo_apellido' => $this->faker->lastName,
        'telefono' => $this->faker->numerify('########'),
        'celular' => $this->faker->numerify('########'),
        'direccion' => $this->faker->address,
        'email' => $this->faker->unique()->safeEmail,
        'fecha_nacimiento' => $this->faker->date,
        'observaciones' => $this->faker->sentence,
        'grado_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
