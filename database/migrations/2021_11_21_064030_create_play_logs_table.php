<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('play_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('arcade_location_game_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('tickets');
            $table->integer('swipes');
            $table->boolean('jackpot');
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
        Schema::dropIfExists('play_logs');
    }
}
