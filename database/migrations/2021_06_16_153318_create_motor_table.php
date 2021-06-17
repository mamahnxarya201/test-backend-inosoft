<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Collection;
use Jenssegers\Mongodb\Schema\Blueprint;

class CreateMotorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motors', function (Blueprint $collection) {
            $collection->unsignedInteger('stok');
            $collection->string('mesin');
            $collection->string('tipe_suspensi');
            $collection->string('tipe_transmisi');
            $collection->json('kendaraan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motor');
    }
}
