<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class CommentController extends Controller {
	public function add($user_id, $level)
	{
		$user = User::findOrFail($user_id);
		switch ($level) {
		case 'good':
			$user->comments_good++;
			break;
		case 'mid':
			$user->comments_mid++;
			break;
		case 'bad':
			$user->comments_bad++;
			break;
		default:
			break;
		}
		$user->save();

		return ['errno' => 0, 'errmsg' => 'success'];
	}

}

