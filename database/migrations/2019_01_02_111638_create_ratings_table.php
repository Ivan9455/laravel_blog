<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');;
            $table->integer('id_post')->unsigned();
            $table->foreign('id_post')->references('id')->on('posts');;
            $table->enum('status', [-1, 1]);//like,not like ,diz like
            $table->timestamps();
        });
        DB::table('ratings')->insert([
            'id_user' => 2,
            'id_post' => 1,
            'status' => '1'
        ]);
        DB::table('ratings')->insert([
            'id_user' => 3,
            'id_post' => 1,
            'status' => '1'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
