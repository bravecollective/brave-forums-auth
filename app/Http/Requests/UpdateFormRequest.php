<?php namespace App\Http\Requests;

use App\ForumUser;
use App\Http\Requests\Request;

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
        $rules['password'] = 'required';

        if(ForumUser::find(['forum_auth_user_id' => \Auth::user()->id])){
            $rules['email'] = 'required|email|max:255';
        } else {
            $rules['email'] = 'required|email|max:255|unique:forum_users';
        }

		return $rules;
	}

}
