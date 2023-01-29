<?php

namespace Database\Factories\backend;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\backend\Perfil;
use App\Models\backend\User;

class PerfilFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Perfil::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'edad' => $this->faker->randomDigitNotNull,
            'id_profesion' => $this->faker->randomDigitNotNull,
            'biografia' => $this->faker->text,
            'website' => $this->faker->regexify('[A-Za-z0-9]{128}'),
        ];
    }
}
