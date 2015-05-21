<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class BonusController extends Controller {

	public function add($user_id, $bonus)
	{
		$user = User::findOrFail($user_id);
		$user->bonus_total += $bonus;
		$user->save();

		return ['errno' => 0, 'errmsg' => 'success', 'bonus' => $user->bonus_total];
	}
	
	public function cost($user_id, $bonus)
	{
		$user = User::findOrFail($user_id);
		$user->bonus_total -= $bonus;
		$user->save();

		return ['errno' => 0, 'errmsg' => 'success', 'bonus' => $user->bonus_total];
	}
}
