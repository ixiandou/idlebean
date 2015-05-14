<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Facades\Sms;
use Auth;


use Illuminate\Http\Request;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		return User::where($request->all())->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return redirect('/auth/register');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$user = User::create($request->all());
		$user->save();
		return $user;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function reg($mobile)
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
