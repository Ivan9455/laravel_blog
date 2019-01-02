<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
        DB::table('posts')->insert([
            'content' => 'text',
            'id_user' => 1
        ]);
    }

    /**
     * Reverse the migrations.password_resets
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
