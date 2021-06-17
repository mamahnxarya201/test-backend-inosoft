<?php

namespace Database\Factories;

use App\Models\Motor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class MotorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Motor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));
            return [
                'stok' => $this->faker->randomDigit(),
                'mesin' => $this->faker->randomElement(['100cc', '125cc', '350cc']),
                'tipe_suspensi' => $this->faker->randomElement(['Mono Shock','Dual Shock']),
                'tipe_transmisi' => $this->faker->randomElement(['Matic', 'Manual', 'Kopling']),
                'kendaraan' => json_encode([
                    'tahun' => $this->faker->year($max = now()),
                    'warna' => $this->faker->colorName(),
                    'harga' => $this->faker->numberBetween($min = 150000000, $max = 600000000)
                ])
            ];

    }
}
