<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_users', function(Blueprint $table)
        {
            $table->increments('id');
	        $table->string('account_id', 60)->unique();
	        $table->bigInteger('forum_auth_user_id')->index();
	        $table->string('username')->unique();
	        $table->string('email')->unique();
            $table->string('password');

	        $table->text('forum_groups');
	        $table->string('corp_id')->index();
	        $table->string('corp_name');
	        $table->string('alliance_id')->index();
	        $table->string('alliance_name');

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
        Schema::drop('forum_users');
    }

}
