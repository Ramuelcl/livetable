<?php

namespace Database\Factories\banca;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\banca\Movimiento;

class MovimientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movimiento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cuenta' => $this->faker->regexify('[A-Za-z0-9]{12}'),
            'tipo' => $this->faker->regexify('[A-Za-z0-9]{3}'),
            'date' => $this->faker->dateTime(),
            'libelle' => $this->faker->word,
            'montant' => $this->faker->randomFloat(2, 0, 999999.99),
            'cliente_id' => $this->faker->numberBetween(-100000, 100000),
        ];
    }
}
