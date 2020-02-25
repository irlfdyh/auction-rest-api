<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLelangModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lelang_models', function (Blueprint $table) {
            $table->bigIncrements('id_lelang');
            $table->integer('id_barang');
            $table->integer('id_user');
            $table->integer('id_petugas');
            $table->integer('harga_akhir');
            $table->date('tanggal_lelang');
            $table->enum('status', ['dibuka', 'ditutup']);

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
        Schema::dropIfExists('lelang_models');
    }
}
