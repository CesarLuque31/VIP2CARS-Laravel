<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'placa' => strtoupper($this->faker->bothify('???-####')),
            'marca' => $this->faker->randomElement(['Toyota','Nissan','Hyundai','Kia','Chevrolet','Ford']),
            'modelo' => $this->faker->randomElement(['Sedan','Hatchback','SUV','Pickup','Coupe']),
            'anio_fabricacion' => $this->faker->numberBetween(1995, (int) date('Y')),
            'cliente_nombre' => $this->faker->firstName(),
            'cliente_apellido' => $this->faker->lastName(),
            'cliente_documento' => (string) $this->faker->numberBetween(10000000, 99999999),
            'cliente_correo' => $this->faker->safeEmail(),
            'cliente_telefono' => $this->faker->phoneNumber(),
            'esta_activo' => true,
        ];
    }
}
