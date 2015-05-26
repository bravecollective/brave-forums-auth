<?php namespace App\Http\Controllers;

use App\ForumUser;
use App\Http\Requests\UpdateFormRequest;
use Illuminate\Http\Request;
use ZxcvbnPhp\Zxcvbn;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$auth_user = \Auth::user();
		$forum_user = ForumUser::firstOrNew(['forum_auth_user_id' => \Auth::user()->id]);

		return view('home', ['user' => $auth_user, 'forum_user' => $forum_user]);
	}

    /**
     * Update the Forum User
     *
     * @param UpdateFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAction(UpdateFormRequest $request) {
	    $forum_user = ForumUser::firstOrCreate(['forum_auth_user_id' => \Auth::user()->id]);
        $forum_user->forum_auth_user_id = \Auth::user()->id;
        $forum_user->email = $request->input('email');

        // Only save new passwords
        if($request->input('password') !== '' && $request->input('password') === $request->input('password_confirmation')) {
            $forum_user->password = \Hash::make($request->input('password'));
        }

        $forum_user->username = \Auth::user()->character_name;
        $forum_user->corp_id = \Auth::user()->corporation_id;
        $forum_user->corp_name = \Auth::user()->corporation_name;
        $forum_user->alliance_id = \Auth::user()->alliance_id;
        $forum_user->alliance_name = \Auth::user()->alliance_name;

        $forum_user->save();

	    Session::flash('msg', 'Your data was updated.');

        return redirect()->route('home');
    }
}
