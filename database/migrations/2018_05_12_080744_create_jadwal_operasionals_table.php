<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalOperasionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_operasionals', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('operasional_id');
            $table->uuid('service_id')->nullable()->default(null);
            $table->uuid('mekanik_id')->nullable()->default(null);
            $table->date('date')->nullable()->default(null);
            $table->integer('service_count')->nullable()->default(0);
            $table->integer('booking_count')->nullable()->default(0);
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
        Schema::dropIfExists('jadwal_operasionals');
    }
}
