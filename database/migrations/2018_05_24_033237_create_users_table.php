<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
      if(!(Schema::hasTable('users'))) {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('first_name')->nullable();
          $table->string('last_name')->nullable();
          $table->string('place_of_birth')->nullable();
          $table->string('phone')->nullable();
          $table->string('username')->unique()->nullable();
          $table->string('email')->unique();
          $table->string('password');
          $table->date('date_of_birth')->nullable();
          $table->string('gender')->nullable();
          $table->date('address')->nullable();
          $table->rememberToken();
          $table->timestamps();
        });
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      if(Schema::hasTable('users')) {
        Schema::dropIfExists('users');
      }
    }
}
