<?php namespace -namespace-\Commands;
use Illuminate\Console\Command;
use Illuminate\Container\Container;

class -Plugin-InstallCommand extends Command
{
    /**
     * Name of the command.
     * 
     * @param string
     */
    protected $name = '-pluginmin-:install';
    
    /**
     * Necessary to let people know, in case the name wasn't clear enough.
     * 
     * @param string
     */
    protected $description = 'Install -vendorName- -folderName-.';
    
    /**
     * Setup the application container as we'll need this for running migrations.
     */
    public function __construct(Container $app)
    {
		parent::__construct();
		$this->app = $app;
    }
    
    /**
     * Run the package migrations.
     */
    public function handle()
    {
		$migrations = $this->app->make('migration.repository');
        //$migrations->createRepository();

		//Migration
		$migrator = $this->app->make('migrator');
		$migrator->run(__DIR__.'/../database/migrations/');
		
		//Seeding
		$this->call('db:seed', array('--class' => '-namespace-\Database\Seeds\DatabaseSeeder'));
    }
}