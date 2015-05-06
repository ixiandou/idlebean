<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
		$this->call('OrderTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(['email' => 'foo@bar.com']);
    }

}

class OrderTableSeeder extends Seeder {

    public function run()
    {
        DB::table('orders')->delete();

        Order::create(['status' => Order::STATUS_NEW]);
    }

}


