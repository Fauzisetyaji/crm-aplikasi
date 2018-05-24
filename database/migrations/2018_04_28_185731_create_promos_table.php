<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->enum('type', ['pelanggan', 'non-pelanggan'])->default('pelanggan');
            $table->string('nm_promo');
            $table->date('starts_on')->nullable()->default(null);
            $table->date('ends_on')->nullable()->default(null);
            $table->longText('keterangan')->nullable()->default(null);
            $table->uuid('pelanggan_id')->nullable()->default(null);
            $table->uuid('service_id')->nullable()->default(null);
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
        Schema::dropIfExists('promos');
    }
}
