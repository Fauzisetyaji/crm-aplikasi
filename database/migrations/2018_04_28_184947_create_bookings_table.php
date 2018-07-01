<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('booking_number')->nullable()->default(0);
            $table->date('date')->nullable()->default(null);
            $table->datetime('time')->nullable()->default(null);
            $table->string('no_polisi')->nullable()->default(null);
            $table->datetime('cancellation')->nullable()->default(null);
            $table->boolean('status')->default(0);
            $table->enum('jenis_pelayanan', ['workshop', 'tms'])->default('workshop');
            $table->enum('easyService', ['pickup', 'send', 'both', 'self'])->default('pickup');
            $table->enum('type_kendaraan', ['Avanza', 'Agya', 'Calya', 'Rush', 'Yaris'])->nullable()->default(null);
            $table->longText('keterangan')->nullable()->default(null);
            $table->uuid('pelanggan_id')->nullable()->default(null);
            $table->uuid('service_id');
            $table->uuid('jadwal_operasional_id');
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
        Schema::dropIfExists('bookings');
    }
}
