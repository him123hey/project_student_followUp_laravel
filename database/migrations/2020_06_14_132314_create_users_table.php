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
            $table->bigIncrements('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->Integer('role');
            $table->string('password');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->foreign('position_id')
                  ->references('id')
                  ->on('positions')
                  ->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                'firstName' => 'admin',
                'lastName' => 'user',
                'email' => 'admin@gmail.com',
                'role' => 1,
                'position_id' => 1,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            )
        );
        DB::table('users')->insert(
            array(
                'firstName' => 'normal',
                'lastName' => 'user',
                'email' => 'normal@gmail.com',
                'role' => 0,
                'position_id' => 3,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            )
        );
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
