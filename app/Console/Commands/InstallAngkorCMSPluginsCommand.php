<?php namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Container\Container;

class InstallAngkorCMSPluginsCommand extends Command {
	protected $name = 'angkorcms:install';

	protected $description = 'Install all angkorcms plugins.';

	public function __construct(Container $app) {
		parent::__construct();
		$this->app = $app;
	}

	public function handle() {
		$this->call('migrate:install', array());
		$this->call('migrate', array());

		$this->call('angkorcmsusers:install', array());
		$this->info('Users Installed');
		$this->call('angkorcmsmedias:install', array());
		$this->info('Medias Installed');
		$this->call('angkorcmsmultilanguages:install', array());
		$this->info('Multi-languages Installed');
		$this->call('angkorcmspages:install', array());
		$this->info('Pages Installed');
		$this->call('angkorcmsnews:install', array());
		$this->info('News Installed');

		$this->call('angkorcmsmap:install', array());
		$this->info('Maps Installed');
		$this->call('angkorcmsslideshow:install', array());
		$this->info('Slideshows Installed');
		$this->call('angkorcmslisting:install', array());
		$this->info('Lists Installed');
		$this->call('angkorcmscontent:install', array());
		$this->info('Contents Installed');

		$this->call('db:seed', array('--class' => 'UsersDatabaseSeeder')); //User just seed
		$this->call('db:seed', array('--class' => 'MediasDatabaseSeeder'));
		$this->call('db:seed', array('--class' => 'LangsDatabaseSeeder'));
		$this->call('db:seed', array('--class' => 'PagesDatabaseSeeder'));
		$this->call('db:seed', array('--class' => 'NewsDatabaseSeeder'));
	}
}
