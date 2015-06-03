<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	const ROLE_TYPE_ADMIN = 0;
	const ROLE_TYPE_CLIENT = 1;
	const ROLE_TYPE_WORKER = 2;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'telephone', 'role', 'area', 'address', 'score', 'status', 'lng', 'lat', 'recommend_tel',];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token', 'confirmation_code', 'confirmation_expire', 'token', 'token_expire'];
	//protected $hidden = ['password', 'remember_token'];

}
