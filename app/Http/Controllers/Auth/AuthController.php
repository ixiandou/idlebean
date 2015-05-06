<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => ['getLogout', 'getConfirm', 'postRegister', 'postLogin', 'anyCheckmail']]);
	}

	public function getConfirm($confirmation_code)
	{
		$user = User::where('confirmation_code', '=', $confirmation_code)->firstOrFail();
		$user->confirmed = 1;
		$user->confirmation_code = null;
		$user->save();
                $this->auth->login($user);
                return redirect($this->redirectPath());
	}

        /**
         * Handle a login request to the application.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function postLogin(Request $request)
        {
                file_put_contents('/tmp/login', var_export(method_exists($this, 'validate'), true));
                $ret = $this->validate($request, [
                        'email' => 'required|email', 'password' => 'required',
                ]);

                $credentials = $request->only('email', 'password');
                $credentials['confirmed'] = 1;

                if ($this->auth->attempt($credentials, $request->has('remember')))
                {
                        return redirect()->intended($this->redirectPath());
                }

                return redirect($this->loginPath())
                                        ->withInput($request->only('email', 'remember'))
                                        ->withErrors([
                                                'email' => $this->getFailedLoginMessage(),
                                        ]);
        }

        /**
         * Handle a registration request for the application.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function postRegister(Request $request)
        {
                $validator = $this->registrar->validator($request->all());
		file_put_contents('/tmp/reg', 'define', FILE_APPEND);

                if ($validator->fails())
                {
                        $this->throwValidationException(
                                $request, $validator
                        );
                }

		$user = $this->registrar->create($request->all());

                return redirect('/auth/checkmail/' . urlencode($user->email));
        }

        /**
         * Show the check email page
         *
         * @return \Illuminate\Http\Response
         */
        public function anyCheckmail($email)
        {
                return view('auth.checkmail', ['email' => $email]);
        }
}
