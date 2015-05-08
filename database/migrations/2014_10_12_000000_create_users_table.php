<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('name');
			$table->string('email');
			$table->string('password', 60);
			$table->string('token', 128);
			$table->integer('token_expire')->unsigned();
			$table->string('confirmation_code');
			$table->integer('confirmation_expire')->unsigned();
                        $table->string('telephone');
                        $table->string('area');
                        $table->string('address');
			$table->integer('role');
                        $table->integer('score');
                        $table->integer('bonus_total');
                        $table->integer('bonus_unpaid');
                        $table->integer('comments_good');
                        $table->integer('comments_mid');
                        $table->integer('comments_bad');
                        $table->integer('status');
			$table->double('lng');
			$table->double('lat');
			$table->rememberToken();
			$table->timestamps();
			$table->unique(['email', 'telephone']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
