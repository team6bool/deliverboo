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
            $table->id();
            $table->string('name', 50);
            $table->string('slug', 100)->unique();
            $table->string('email', 50);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address', 100);
            $table->string('phone', 15)->nullable();
            $table->string('website', 200)->nullable();
            $table->string('img', 200);
            $table->text('description', 2000)->nullable();
            $table->string('p_iva', 11);
            $table->double('delivery_price', 4, 2);
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
        Schema::dropIfExists('users');
    }
}
