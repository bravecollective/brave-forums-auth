<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumUser extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'forum_users';

	/**
	 * The database connection used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'forum_users';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'account_id',
		'forum_auth_user_id',
		'username',
		'email',
		'forum_groups',
		'corp_id',
		'corp_name',
		'alliance_id',
		'alliance_name',
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

}
