<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			//
			$table->bigIncrements('id');
                        $table->bigInteger('client_id');
                        $table->bigInteger('worker_id');
                        $table->string('type');
                        $table->string('name');
                        $table->string('channel');
                        $table->string('version');
                        $table->string('color');
                        $table->string('storage');
                        $table->string('insurance');
                        $table->string('surface');
                        $table->string('screen_surface');
                        $table->string('screen_display');
                        $table->string('damp');
                        $table->string('repair');
                        $table->string('start_problem');
                        $table->string('key_problem');
                        $table->string('address');
                        $table->string('user_img_path');
                        $table->string('user_img_url');
                        $table->string('worker_img_path');
                        $table->string('worker_img_url');
                        $table->float('eval_price');
                        $table->float('real_price');
			$table->double('lng');
			$table->double('lat');
                        $table->integer('status');
			$table->text('pic_list');
                        $table->text('attr');
                        $table->text('other');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}
}
