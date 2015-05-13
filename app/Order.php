<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	const STATUS_NEW      = 0;
	const STATUS_VERIFIED = 1;
	const STATUS_PUSHED   = 2;
	const STATUS_FINISHED = 3;
	const STATUS_DELETED  = 4;
	//

}
