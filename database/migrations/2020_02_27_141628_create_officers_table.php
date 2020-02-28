<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officers', function (Blueprint $table) {
            $table->bigIncrements('officer_id', 11);

            // level
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')
                ->references('level_id')
                ->on('levels');

            $table->string('officer_name', 25);
            $table->string('username', 25)->unique();
            $table->string('password');
            $table->enum('status', ['active', 'deactive']);
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
        Schema::dropIfExists('officers');
    }
}
