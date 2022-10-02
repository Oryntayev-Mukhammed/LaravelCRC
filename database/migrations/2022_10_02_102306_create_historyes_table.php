<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryesTable extends Migration
{

    public function up()
    {
        Schema::create('historyes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id');
            $table->foreignId('game_id');
            $table->double('price');
            $table->string('buy_type');
        });
    }

    public function down()
    {
        Schema::dropIfExists('historyes');
    }
}
