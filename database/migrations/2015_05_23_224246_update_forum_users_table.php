<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForumUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('forum_users', function($table)
	    {
		    $table->bigInteger('alliance_id')->nullable()->default(null)->change();
		    $table->bigInteger('corp_id')->nullable()->default(null)->change();
		    $table->dropUnique('forum_users_username_unique');
		    $table->dropColumn('username');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('forum_users', function($table)
	    {
		    $table->string('account_id', 60)->change();
		    $table->string('alliance_id')->nullable()->change();
		    $table->string('corp_id')->nullable()->change();
		    $table->string('username')->unique();
	    });
    }

}
