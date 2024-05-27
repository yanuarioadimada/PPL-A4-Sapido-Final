<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Induk;

class IndukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Induk::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'jenis_kelamin' => $this->faker->randomElement(["jantan","betina"]),
            'umur' => $this->faker->numberBetween(-10000, 10000),
            'keterangan' => $this->faker->text(),
            'gambar' => $this->faker->word(),
        ];
    }
}
