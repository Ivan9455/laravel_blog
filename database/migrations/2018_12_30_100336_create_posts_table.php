<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
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
            $table->increments('id')->unique();
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_author')->unsigned();
            $table->foreign('id_author')->references('id')->on('users');
            $table->integer('id_content')->unsigned();
            $table->timestamps();
            //связь не работает выдает ошибку прилось прописывать в ручную
            //$table->foreign('id_content')->references('id')->on('contents');
        });

//        Schema::table('contents', function($table){
//            $table->foreign('id_content')->references('id')->on('contents')->onDelete('cascade');
//        });
    }

    /**
     *
     * Reverse the migrations.password_resets
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
