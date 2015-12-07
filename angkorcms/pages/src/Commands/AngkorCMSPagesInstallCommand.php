<?php namespace AngkorCMS\Pages\Commands;
use Illuminate\Console\Command;
use Illuminate\Container\Container;

class AngkorCMSPagesInstallCommand extends Command {
	protected $name = 'angkorcmspages:install';

	protected $description = 'Install angkorcms pages.';

	public function __construct(Container $app) {
		parent::__construct();
		$this->app = $app;
	}

	public function handle() {
		$migrations = $this->app->make('migration.repository');

		$migrator = $this->app->make('migrator');
		$migrator->run(__DIR__ . '/../database/migrations/');
		
	}
}