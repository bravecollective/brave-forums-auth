<?php namespace App\Http\Requests;

use App\ForumUser;

class UpdateFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return \Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        $rules = [];
		$rules['email'] = 'required|email|max:255|unique:forum_users';

        if(ForumUser::find(['forum_auth_user_id' => \Auth::user()->id])){
	        $rules['password'] = 'confirmed';
        } else {
	        $rules['password'] = 'required|confirmed';
        }

		return $rules;
	}

}
