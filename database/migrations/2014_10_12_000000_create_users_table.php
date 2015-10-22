<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('bio', 120);
            $table->rememberToken();
            $table->boolean('location')->nullable();
            $table->boolean('active');
            $table->boolean('had_feedback_email');
            $table->boolean('sync_name_bio');
            $table->datetime('birthday');
            $table->string('gender');
            $table->integer('timezone');
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
        Schema::drop('users');
    }
}
