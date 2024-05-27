<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Hewan;
use App\Models\KelahiranKematian;

class KelahiranKematianFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KelahiranKematian::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'tanggal' => $this->faker->date(),
            'jenis:enum' => $this->faker->word(),
            'keterangan' => $this->faker->text(),
            'id_hewan' => Hewan::factory(),
        ];
    }
}
