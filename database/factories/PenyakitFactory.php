<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Hewan;
use App\Models\Penyakit;

class PenyakitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Penyakit::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'jenis_penyakit' => $this->faker->word(),
            'gejala' => $this->faker->word(),
            'keterangan' => $this->faker->text(),
            'id_hewan' => Hewan::factory(),
        ];
    }
}
