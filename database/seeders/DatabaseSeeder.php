<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kendaraan;
use App\Models\Mobil;
use App\Models\Motor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Mobil::factory()
            ->count(5)
            ->create();
        Motor::factory()
            ->count(5)
            ->create();

    }
}
