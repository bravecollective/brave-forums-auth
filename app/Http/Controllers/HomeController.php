<?php namespace App\Http\Controllers;

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
		$user = \Auth::user();
		return view('home', ['user' => $user]);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function updateForumUser(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|unique|max:255',
			'password' => 'required',
		]);

		$userData = array(
			'Marco',
			'marco@example.com'
		);

		$zxcvbn = new Zxcvbn();
		$strength = $zxcvbn->passwordStrength('password', $userData);
		echo $strength['score'];

		$user = \Auth::user();
		return view('home', ['user' => $user]);
	}

}
