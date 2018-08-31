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
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 100);
            $table->string('password');
            $table->smallInteger('pin')->nullable();
            $table->boolean('user_type')->default(1); // User = 1, Admin = 2
            $table->unsignedSmallInteger('purchases')->default(0); // Total of purchases for prizes and discounts
            $table->text('picture')->nullable();
            $table->string('notes', 50)->nullable();
            $table->string('dni', 20)->nullable();
            $table->string('dni_type', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->rememberToken();
        });
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
