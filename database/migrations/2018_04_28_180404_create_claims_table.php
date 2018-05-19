<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('no_claim')->nullable()->default(null);
            $table->date('tgl_claim');
            $table->integer('point_potong');
            $table->boolean('status')->default(0);
            $table->uuid('reward_id');
            $table->uuid('pelanggan_id');
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
        Schema::dropIfExists('claims');
    }
}
