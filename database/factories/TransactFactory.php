<?php

namespace Database\Factories;

use App\Models\Transact;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'date' => $this->faker->date(),
            'harga' => $this->faker->numberBetween($min = 0, $max = 2147483647),
            'item' => json_encode([
                'mobil' => $this->faker->shuffleArray()
            ])

        ];
    }
}
