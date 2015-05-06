<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	const STATUS_NEW      = 0;
	const STATUS_VERIFIED = 1;
	const STATUS_FINISHED = 2;
	const STATUS_DELETED  = 8;
	//

}
