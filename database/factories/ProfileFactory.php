<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Profile;
use App\Models\User;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'alamat' => $this->faker->word(),
            'foto_profil' => $this->faker->regexify('[A-Za-z0-9]{nullable}'),
            'id_user' => User::factory(),
        ];
    }
}
