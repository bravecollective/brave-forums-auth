<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLookupTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_lookup', function(Blueprint $table)
        {
            $table->increments('id', 32);
            $table->timestamps();
            $table->string('username', 250);
            $table->string('email', 60);
            $table->string('account_id', 60);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_lookups');
    }

}
