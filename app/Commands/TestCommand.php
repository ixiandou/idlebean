<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class TestCommand extends Command implements SelfHandling, ShouldBeQueued {

	use InteractsWithQueue, SerializesModels;

	protected $message;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($message)
	{
		//
		$this->message = $message;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		//
		file_put_contents('/tmp/queue', $this->message . PHP_EOL, FILE_APPEND);
	}

}
