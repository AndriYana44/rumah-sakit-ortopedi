<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Dokter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Dokter>
 */
class DokterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Dokter::class;



    public function definition(): array
    {
        return [
            //
            'nip' => fake()->unique()->randomFloat(),
            'nama_dokter' => fake()-> name(),
            'spesialis' => fake()->jobTitle(),
            'alamat' => fake()->address(),
            'no_telp' =>fake()->randomNumber(5,false),
            'foto' => fake()->image(),
            'email' => fake()->email()
        ];
    }
}
