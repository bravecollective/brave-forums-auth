<?php namespace App\Http\Controllers;

use App\ForumUser;
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
     * @param \App\Http\Requests\UpdateFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAction(\App\Http\Requests\UpdateFormRequest $request){

        $api = \App::make('CoreApi');
        $lookup = $api->lookup->character(['search' => \Auth::user()->id]);

        $user = ForumUser::firstOrCreate(['forum_auth_user_id' => \Auth::user()->id]);
        $user->forum_auth_user_id = \Auth::user()->id;
        $user->email = $request->input('email');

        // Only save new passwords
        if($request->input('password') != $user->password){
            $user->password = bcrypt($request->input('password'));
        }

        $user->username = \Auth::user()->character_name;
        $user->corp_id = $lookup->corporation->id;
        $user->corp_name = $lookup->corporation->name;
        $user->alliance_id = $lookup->alliance->id;
        $user->alliance_name = $lookup->alliance->name;

        $user->save();

        return redirect()->route('home');
    }


}
