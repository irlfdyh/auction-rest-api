<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officiers', function (Blueprint $table) {
            $table->bigIncrements('officier_id', 11);
            $table->string('officier_name', 25);
            $table->string('username', 25)->unique();
            $table->string('password', 25);
            $table->enum('status', ['active', 'deactive']);
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')
                ->references('level_id')
                ->on('levels');
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
        Schema::dropIfExists('officiers');
    }
}
