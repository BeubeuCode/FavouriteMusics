<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUserFavouriteSongs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_user_favourite_songs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('track_id');
            $table->text('track_name');
            $table->text('track_artist');
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
        Schema::dropIfExists('table_user_favourite_songs');
    }
}
