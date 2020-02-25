<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_models', function (Blueprint $table) {
            $table->bigIncrements('id_barang');
            $table->integer('id_kategori');
            $table->string('nama_barang');
            $table->string('tgl');
            $table->integer('harga_awal');
            $table->string('deskripsi_barang');
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
        Schema::dropIfExists('barang_models');
        // Schema::table('barang_models', function (Blueprint $table) {
        //     $table->addColumn(['id_kategori']);
        // });
    }
}
