<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('kode_pelanggan')->nullable();
            $table->string('nm_pelanggan');
            $table->enum('id_type', ['KTP', 'SIM', 'NPWP'])->default('KTP');
            $table->string('id_number')->nullable()->default(null);
            $table->longText('alamat');
            $table->string('no_tlp');
            $table->string('jml_poin')->nullable()->default(null);
            $table->uuid('user_id');
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
        Schema::dropIfExists('pelanggans');
    }
}
