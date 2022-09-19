<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 15)->nullable();
            $table->string('website', 200)->nullable();
            $table->string('slug', 200)->unique();
            $table->string('address', 100);
            $table->string('img', 50);
            $table->text('description', 2000)->nullable();
            $table->char('p_iva', 11);
            $table->double('delivery_price', 4, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('website');
            $table->dropColumn('slug');
            $table->dropColumn('address');
            $table->dropColumn('img');
            $table->dropColumn('description');
            $table->dropColumn('p_iva');
            $table->dropColumn('delivery_price');
        });
    }
}
