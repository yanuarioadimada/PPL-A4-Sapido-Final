<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Hewan;
use App\Models\Induk;
use App\Models\JenisHewan;

class HewanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hewan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'jenis_kelamin' => $this->faker->randomElement(["jantan","betina"]),
            'keterangan' => $this->faker->text(),
            'id_jenis_hewan' => JenisHewan::factory(),
            'id_induk' => Induk::factory(),
        ];
    }
}
