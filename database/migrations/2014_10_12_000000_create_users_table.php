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
    //https://laravel.com/docs/4.2/schema
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 50);
            $table->string('voornaam', 100);
            $table->string('tussenvoegsel', 20);
            $table->string('achternaam');
            $table->string('geslacht');
            $table->string('land');
            $table->string('stad');
            $table->char('postcode', 6);
            $table->string('straatnaam');
            $table->string('huisnummer');
            $table->integer('credits');
            $table->string('status');
            $table->string('role');
            $table->string('geboortedatum');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
