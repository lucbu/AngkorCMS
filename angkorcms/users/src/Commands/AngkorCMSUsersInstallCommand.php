<?php namespace AngkorCMS\Users\Commands;

use Illuminate\Console\Command;
use Illuminate\Container\Container;

class AngkorCMSUsersInstallCommand extends Command {
	/**
	 * Name of the command.
	 *
	 * @param string
	 */
	protected $name = 'angkorcmsusers:install';

	/**
	 * Necessary to let people know, in case the name wasn't clear enough.
	 *
	 * @param string
	 */
	protected $description = 'Install angkorcms users.';

	/**
	 * Setup the application container as we'll need this for running migrations.
	 */
	public function __construct(Container $app) {
		parent::__construct();
		$this->app = $app;
	}

	/**
	 * Run the package migrations.
	 */
	public function handle() {
	}
}