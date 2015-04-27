<?php namespace App;

use Brave\Core\Models\CoreAuthUser;

/**
 * Class ForumAuthUser
 *
 * @package App
 */
class ForumAuthUser extends CoreAuthUser {


	/**
	 * Group List Relationship
	 *
	 * @return mixed
	 */
	public function forumUser()
	{
		return $this->hasOne('App\ForumUser', 'forum_auth_user_id', 'id');
	}
}
