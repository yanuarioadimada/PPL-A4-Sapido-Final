<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\JenisHewan;

class JenisHewanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JenisHewan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'jenis_hewan' => $this->faker->regexify('[A-Za-z0-9]{100}'),
        ];
    }
}
