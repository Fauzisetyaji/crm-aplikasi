<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spps', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('service_id');
            $table->date('tanggal')->nullable()->default(null);
            $table->uuid('kehulan_id');
            $table->uuid('pelanggan_id');
            $table->uuid('mekanik_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spps');
    }
}
