<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiddersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidders', function (Blueprint $table) {
            $table->bigIncrements('bid_id');

            $table->unsignedBigInteger('auction_id');
            $table->foreign('auction_id')
                ->references('auction_id')
                ->on('auctions');

            $table->unsignedBigInteger('society_id');
            $table->foreign('society_id')
                ->references('society_id')
                ->on('societies');
                
            $table->integer('bid_price');
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
        Schema::dropIfExists('bidders');
    }
}
