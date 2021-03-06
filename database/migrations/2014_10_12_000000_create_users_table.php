<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

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
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            [
                'name' => 'Muaddib',
                'email' => 'paderin94126@gmail.com',
                'password' => Hash::make('111111')
            ]);
        DB::table('users')->insert([
            'name' => 'ivan',
            'email' => 'paderin941261@gmail.com',
            'password' => Hash::make('111111')
        ]);
        DB::table('users')->insert([
            'name' => 'ivan2',
            'email' => 'paderin941262@gmail.com',
            'password' => Hash::make('111111')
        ]);
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
