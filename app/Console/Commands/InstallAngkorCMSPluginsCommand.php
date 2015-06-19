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
		
		$this->call('angkorcmsmedias:install', array());
		$this->info('Medias Installed');
		$this->call('angkorcmsmultilanguages:install', array());
		$this->info('Multi-languages Installed');
		$this->call('angkorcmspages:install', array());
		$this->info('Pages Installed');
		
		$this->call('angkorcmsmap:install', array());
		$this->info('Maps Installed');
		$this->call('angkorcmsslideshow:install', array());
		$this->info('Slideshows Installed');
		$this->call('angkorcmslisting:install', array());
		$this->info('Lists Installed');
		$this->call('angkorcmscontent:install', array());
		$this->info('Contents Installed');
		
		
		$this->call('db:seed', array('--class' => 'AngkorCMS\Users\Database\Seeds\DatabaseSeeder'));//User just seed
		$this->call('db:seed', array('--class' => 'AngkorCMS\Medias\Database\Seeds\DatabaseSeeder'));
		$this->call('db:seed', array('--class' => 'AngkorCMS\MultiLanguages\Database\Seeds\DatabaseSeeder'));
		$this->call('db:seed', array('--class' => 'AngkorCMS\Pages\Database\Seeds\DatabaseSeeder'));
	}
}