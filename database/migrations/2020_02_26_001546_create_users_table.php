<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');

            // level
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')
                ->references('level_id')
                ->on('levels');

            $table->string('username', 25)->unique();
            $table->string('password');

            // user token
            $table->string('api_token', 80)
                ->unique()
                ->nullable()
                ->default(null);

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
        Schema::dropIfExists('users');
    }
}
