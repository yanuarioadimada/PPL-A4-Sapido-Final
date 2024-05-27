<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TumbuhKembang;

class TumbuhKembangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TumbuhKembang::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'umur' => $this->faker->numberBetween(-10000, 10000),
            'tinggi' => $this->faker->numberBetween(-10000, 10000),
            'berat_badan' => $this->faker->numberBetween(-10000, 10000),
            'jumlah_gigi' => $this->faker->numberBetween(-10000, 10000),
            'id_hewan:id foreign' => $this->faker->word(),
        ];
    }
}
