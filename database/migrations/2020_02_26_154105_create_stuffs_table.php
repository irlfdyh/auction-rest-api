<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStuffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuffs', function (Blueprint $table) {
            $table->bigIncrements('stuff_id', 11);

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('category_id')
                ->on('categories');

            $table->unsignedBigInteger('officer_id');
            $table->foreign('officer_id')
                ->references('officer_id')
                ->on('officers');
                
            $table->string('stuff_name', 25);
            $table->integer('started_price');
            $table->text('description');
            $table->string('image_url');
            $table->enum('status', ['disimpan', 'dilelang']);
            $table->date('date');
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
        Schema::dropIfExists('stuffs');
    }
}
