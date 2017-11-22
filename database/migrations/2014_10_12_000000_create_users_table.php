<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Faker\Provider\Uuid;

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
            $table->uuid('guid')->default(Uuid::uuid());
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username')->unique();
            $table->string('email_address')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('verified_name')->default(false);
            $table->timestamp('date_registered');
            $table->timestamps();
            $table->boolean('status')->default(true);
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
