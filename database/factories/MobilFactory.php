<?php

namespace Database\Factories;

use App\Models\Mobil;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class MobilFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mobil::class;

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
                'mesin' => $this->faker->vehicleModel(),
                'kapasitas_penumpang' => $this->faker->vehicleSeatCount(),
                'tipe' => $this->faker->vehicleType(),
                'kendaraan' => json_encode([
                    'tahun' => $this->faker->year($max = now()),
                    'warna' => $this->faker->colorName(),
                    'harga' => $this->faker->numberBetween($min = 150000000, $max = 600000000)
                ])
            ];

    }
}
