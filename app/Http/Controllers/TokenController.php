<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Facades\Sms;
use Illuminate\Http\Request;

class TokenController extends Controller {

	/**
	 * Request a token
	 *
	 * @param  string  $mobile
	 * @return Response
	 */
	public function fetch($mobile)
	{
		$confirmation_code = rand(100000, 999999);
		$user = User::firstOrNew(['telephone' => $mobile]);
		$user->telephone = $mobile;
		$user->confirmation_code = $confirmation_code;
		$user->confirmation_expire = time() + 600;
		$user->save();
		$ret = Sms::send($mobile, $user->confirmation_code);
		if ($ret['errcode'] != 2) {
			return ['errcode' => -1, 'errmsg' => 'sms'];
		}
		return ['errcode' => 0, 'errmsg' => 'success'];

	}

	/**
	 * confirm
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function confirm($mobile, $code)
	{
		$user = User::where('telephone', '=', $mobile)->first();
		if (!$user) {
			return ['errcode' => -1, 'errmsg' => 'not exist'];
		}
		if ($user->confirmation_code != $code) {
			return ['errcode' => -1, 'errmsg' => 'wrong code'];
		}
		if ($user->confirmation_expire < time()) {
			return ['errcode' => -1, 'errmsg' => 'expire'];
		}

		$user->confirmation_code = '';
		$user->confirmation_expire = 0;
		$user->token = str_random(64);
		$user->token_expire = time() + 259200;
		$user->save();
		return ['errcode' => 0, 'errmsg' => 'success', 'token' => $user->token];
	}

	public function check($mobile, $token)
	{
		return User::where('telephone', '=', $mobile)->where('token', '=', $token)->firstOrFail();
	}
}
