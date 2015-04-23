<?php namespace App\Http\Controllers;

/**
 * Class LoginController
 *
 * @package App\Http\Controllers
 */
class LoginController extends Controller {

	/**
	 * @var null
	 */
	private $api = null;

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/**
	 *
	 */
	public function __construct()
	{
		$this->api = \App::make('CoreApi');
	}

	/**
	 * @return mixed
	 */
	public function loginView()
	{
		return view('login');
	}

	/**
	 * @return mixed
	 */
	public function loginAction()
	{
		// API Call Args
		$info_data = array(
			'success' => route('info'),
			'failure' => route('info')
		);
		$result = $this->api->core->authorize($info_data);

		return \Redirect::to($result->location);
	}

	/**
	 * @return mixed
	 */
	public function infoAction()
	{
		$token = \Input::get('token', false);
		if($token == false)
		{
			return \Redirect::route('login')
			               ->with('flash_error', 'Login Failed, Please Try Again');
		}

		if (\Auth::attempt(array('token' => $token)))
		{
			return \Redirect::intended('/');
		}
		else
		{
			return \Redirect::route('login')
			               ->with('flash_error', 'Login Failed, Please Try Again');
		}
	}

	/**
	 * @return mixed
	 */
	public function logoutAction()
	{
		//$token = Auth::user()->token;

		\Auth::logout();

		return \Redirect::route('home')
		               ->with('flash_notice', 'You are successfully logged out.');
	}

	/**
	 * @return mixed
	 */
	public function deauthAction()
	{
		$user = \Auth::user();
		$this->api->core->deauthorize(array('token' => $user->token));

		$user->status = 0;
		$user->save();

		\Auth::logout();

		return \Redirect::route('home')
		               ->with('flash_notice', 'You are successfully logged out.');
	}

}