<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->bigIncrements('auction_id');
            
            // stuff_id foreign key
            $table->unsignedBigInteger('stuff_id');
            $table->foreign('stuff_id')
                ->references('stuff_id')
                ->on('stuffs');

            // officier_id foreign key
            $table->unsignedBigInteger('officer_id');
            $table->foreign('officer_id')
                ->references('officer_id')
                ->on('officers');

            // user_id foreign key    
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users');

            $table->date('auction_date');
            $table->integer('final_price')->nullable();
            $table->enum('status', ['open', 'close']);
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
        Schema::dropIfExists('auctions');
    }
}
