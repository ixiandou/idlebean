<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Elasticesearch\Client;

class ElasticsearchProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
		$this->app->singleton('elasticsearch', function () {
			return new Client;
		});
	}

}
