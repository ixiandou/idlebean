<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Mail;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$confirmation_code = str_random(32);
		$data['password'] = bcrypt($data['password']);
		$user =  User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => $data['password'],
			'confirmation_code' => $confirmation_code,
		]);
		Mail::send('emails.verify', ['confirmation_code' => $confirmation_code ], function ($message) use($data) {
			$message->to($data['email'], $data['name'])->subject('Verify your email address');
		});
		return $user;
	}

}
