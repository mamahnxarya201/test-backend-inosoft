<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Collection;
use Jenssegers\Mongodb\Schema\Blueprint;

class CreateMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobils', function (Blueprint $collection) {
            $collection->unsignedInteger('stok');
            $collection->string('mesin');
            $collection->string('kapasitas_penumpang');
            $collection->string('tipe');
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
        Schema::dropIfExists('mobils');
    }
}
